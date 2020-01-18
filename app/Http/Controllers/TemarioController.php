<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Materia;
use App\Unidad;
Use App\Temario;
Use App\Key;
Use App\Carrera;
class TemarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }




    public function index()
    {
        //
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
         $temarios = Temario::where('unidad_id', $request->unidad)->orderBy('orden', 'asc')->get();
         $temarios = count($temarios) + 1;

         $n = Temario::create(
            [
                'titulo' => $request->tema,
                'descripcion' => $request->des,
                'unidad_id' => $request->unidad,
                'orden'=> $temarios
            ]);

        return back()->with('success', 'Tema creado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $temarios = Temario::where('unidad_id', $id)->orderBy('orden', 'asc')->get();
        $unidad = Unidad::find($id);
        $materia = Materia::find($unidad->materia_id);
        $carrera = Carrera::find($materia->carrera_id);
        return view('temario.temario_content', compact('temarios','unidad','materia','carrera'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {  
       $tema = Temario::find($id);
       $unidad = Unidad::find($tema->unidad_id);
       $unidades = Unidad::where('materia_id', $unidad->materia_id)->get();
       return view('temario.temario_edit', compact('tema','unidad','unidades'));
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
        Temario::where('id', $id)
        ->update([
            'titulo' => $request->tema,
            'descripcion' => $request->des,
            'unidad_id' =>$request->unidad,
            'orden' =>$request->orden,

          ]);
    
        return redirect()->route('temarios.show',$request->unidad)->with('edit', 'Materia editada correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tema_delete = Temario::find($id);
        Temario::destroy($id);
        $temarios= Temario::where('unidad_id', $tema_delete->unidad_id)->get();

        foreach ($temarios as $key => $value) {
           Temario::where('id', $value->id)->update(['orden' => $key+1]);
        }
        
        return back()->with('delete', 'Tema eliminado correctamente');
    }

    //API
    public function temariosByUnidades($id, $key){
    
        $key = Key::where('llave', $key)->get();
        if(count($key)>0){
            return Temario::where('unidad_id', $id)->get();
        }else{
          return [];
        }
      
    }
}
