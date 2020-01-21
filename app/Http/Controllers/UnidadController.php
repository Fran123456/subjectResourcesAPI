<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Materia;
use App\Unidad;
use App\Temario;
use App\Key;
class UnidadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth')->except('unidadesByMateria');
    }

    public function index()
    {

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $n = Unidad::where('materia_id', $request->materia)->get();
        $n = count($n);
        $unidad = Unidad::create(
            [
                'titulo' => $request->unidad,
                'descripcion' => $request->des,
                'materia_id' => $request->materia,
                'orden_u' => $n+1
            ]);

        return back()->with('success', 'Unidad creada correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Unidad::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $unidad = Unidad::find($id);
        $materia = Materia::find($unidad->materia_id);

        $temarios =  Temario::where('unidad_id', $id)->orderBy('orden', 'asc')->get();
        return view('unidad.unidad_edit', compact('materia','unidad','temarios'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Unidad::where('id', $id)
        ->update([
            'titulo' => $request->titulo,
            'descripcion' => $request->des,
            'orden_u' => $request->orden,
          ]);

        return redirect()->route('materias.show', $request->materiaid)->with('edit', 'Unidad editada correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $unidad_delete = Unidad::find($id);
        Unidad::destroy($id);
        $unidades = Unidad::where('materia_id', $unidad_delete->materia_id)->get();

        foreach ($unidades as $key => $value) {
           Unidad::where('id', $value->id)->update(['orden_u' => $key+1]);
        }

        return back()->with('delete', 'Unidad eliminada correctamente');
    }



    //API
    //obtiene las unidades de la materia $id
    public function unidadesByMateria($id, $key){

        $key = Key::where('llave', $key)->get();
        if(count($key)>0){
            return Unidad::where('materia_id' , $id)->orderBy('orden_u', 'asc')->get();
        }else{
          return [];
        }
    }
}
