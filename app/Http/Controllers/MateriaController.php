<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Materia;
use App\Unidad;
use App\Temario;
use App\Key;
use App\Carrera;
use App\Help\Helping;
use Illuminate\Support\Facades\Storage;

class MateriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth')->except('materiaByCarrera','like_materiaByCarrera');
    }



    public function index()
    {
       // $materias  =  Materia::paginate(15);
        //return view('materia.materias', compact('materias'));
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
            $carrera = Carrera::find($request->carrera);
            $materia = Materia::create(
            [
                'siglas' => $request->siglas,
                'titulo' => $request->materia,
                'descripcion' => $request->des,
                'carrera_id'=>$request->carrera,
                'ciclo'=>$request->ciclo,
            ]);
          //  $carpeta = Helping::reemplazar_caracter(" ", "-", $carrera->carrera);
            Storage::disk('public')->makeDirectory('pdf/'.$request->siglas);
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
       
        $carrera = Carrera::find($id);
        $materias = Materia::where('carrera_id', $id)->get();
        return view('materia.materias', compact('materias','carrera', 'id'));
      
    }

  /*  public function ciclo($id){
    // $id es el id de la carrera  
        $carrera = Carrera::find($id);
       return view('materia.ciclos', compact('carrera'));
    }

    public function materias_ciclo($id, $ciclo){
      //$id es e id de la carrera y el $ciclo es el numero del ciclo al que pertenece
        $carrera = Carrera::find($id);
        $materias = Materia::where('carrera_id', $id)->where('ciclo', $ciclo)->get();
        return view('materia.materias', compact('materias','carrera', 'id','ciclo'));
    }*/

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $materia = Materia::find($id);
        $carreras = Carrera::all();
        return view('materia.materia_edit', compact('materia','carreras'));    
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
            'carrera_id' => $request->carrera,
            'ciclo' => $request->ciclo,
          ]);
    
        return redirect()->route('materias.show', $request->carrera)->with('edit', 'Materia editada correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $materiaD = Materia::find($id);
        Materia::destroy($id);
        Storage::disk('public')->deleteDirectory('pdf/'.$materiaD->siglas, true);
        
      //  $c = Carrera::find($materiaD->carrera_id);

       // $carpeta = Helping::reemplazar_caracter(" ", "-", $c->carrera);
       // Storage::disk('public')->deleteDirectory('pdf/'.$carpeta.'/ciclo-'.$materiaD->ciclo.'/'.$materiaD->siglas, true);

       return back()->with('delete', 'Materia eliminada correctamente');
    }


    //API
    public function materiaByCarrera($id, $key){
        //$id es el id de la carrera
        $key = Key::where('llave', $key)->get();
        if(count($key)>0){
           return Materia::where('carrera_id', $id)->get();
            //return Materia::all();
        }else{
          return [];
        }
    }

    public function like_materiaByCarrera($id, $arg ,$key){

        
      
     $key = Key::where('llave', $key)->get();
        if(count($key)>0){
           return Materia::where('carrera_id', $id)->Where('siglas', 'like',  '%'.$arg.'%')->get();
        }else{
          return [];
        } 
    }


    public function like_materia($arg ,$key){
      
     $key = Key::where('llave', $key)->get();
        if(count($key)>0){
           return Materia::where('siglas', 'like' ,'%'.$arg.'%')->orWhere('titulo', 'like',  '%'.$arg.'%')->get();
        }else{
          return [];
        } 
    }

}
