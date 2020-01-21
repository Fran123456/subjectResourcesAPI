<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Carrera;
use App\Materia;
use App\Key;
use Illuminate\Support\Facades\Storage;
use App\Help\Helping;

class CarreraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth')->except('carreras');
    }



    public function index()
    {
        $carreras = Carrera::all();
        return view('carrera.carreras', compact('carreras'));
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
         $data = Carrera::create([
              'carrera'=> $request->carrera,
              'descripcion'=> $request->des,
         ]);

       // $carpeta = Helping::reemplazar_caracter(" ", "-", $request->carrera);
        //Storage::disk('public')->makeDirectory('pdf/'.$carpeta);
        return back()->with('success', 'Carrera agregado correctamente');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $carrera = Carrera::find($id);
        return view('carrera.carrera_edit', compact('carrera'));
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
         Carrera::where('id', $id)
        ->update([
            'carrera' => $request->carrera,
            'descripcion' => $request->des,
          ]);
    
        return redirect()->route('carreras.index')->with('edit', 'Carrera editada correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {  
          $materias = Materia::where('carrera_id', $id)->get();
          foreach ($materias as $key => $value) {
             Storage::disk('public')->deleteDirectory('pdf/'.$value->siglas, true);
          }
          Carrera::destroy($id);
   
        return back()->with('delete', 'Carrera eliminada correctamente');
    }


    //API
    public function carreras( $key){
        //$id es el id de la carrera
        $key = Key::where('llave', $key)->get();
        if(count($key)>0){
            return Carrera::all();
        }else{
          return [];
        }
    }

    
}
