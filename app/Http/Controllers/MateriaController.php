<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Materia;
use App\Unidad;
use App\Temario;

class MateriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $materias  =  Materia::paginate(15);
        return view('materia.materias', compact('materias'));
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
            $materia = Materia::create(
            [
                'siglas' => $request->siglas,
                'titulo' => $request->materia,
                'descripcion' => $request->des,
            ]);

        return back()->with('success', 'Materia creada correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $materia  = Materia::find($id);
        $unidades = Unidad::where('materia_id', $id)->orderBy('orden_u', 'asc')->get();
        $temarios = array();
        foreach ($unidades as $key => $value) {
            $temarios[$key] = Temario::where('unidad_id', $value->id)->get();
        }
        return view('materia.content', compact('materia','unidades','temarios'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $materia = Materia::find($id);
        return view('materia.materia_edit', compact('materia'));    
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
         Materia::where('id', $id)
        ->update([
            'siglas' => $request->siglas,
            'titulo' => $request->materia,
            'descripcion' => $request->des,
          ]);
    
        return redirect()->route('materias.index')->with('edit', 'Materia editada correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Materia::destroy($id);
        return back()->with('delete', 'Unidad eliminada correctamente');
    }
}
