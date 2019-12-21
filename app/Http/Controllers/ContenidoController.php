<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contenido;
use App\Materia;
use App\Unidad;
use App\Temario;

class ContenidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        if($request->op =="pdf"){
            $file  = $request->file('file');
            $name = time().$file->getClientOriginalName();
            $file->move(public_path().'/pdf',$name);

            $data = Contenido::create([
              'titulo'=> $request->nombre,
              'descripcion'=> $request->des,
              'pdf'=> $name,
              'temario_id' =>$request->temario,
            ]);
        }else{
            $data = Contenido::create([
              'titulo'=> $request->nombre,
              'descripcion'=> $request->des,
              'video'=> $request->embebido,
              'url'=> $request->url,
              'temario_id' =>$request->temario,
            ]);
        }
        

        return back()->with('success', 'Contenido agregado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        $temario = Temario::find($id);
        $unidad = Unidad::find($temario->unidad_id);
        $materia = Materia::find($unidad->materia_id);
        $contenidoVideo = Contenido::where('temario_id', $id)->where('video','!=', null)->get();
        $contenidoPDF = Contenido::where('temario_id', $id)->where('pdf','!=', null)->get();
        return view('contenido.contenido', compact('contenidoVideo','contenidoPDF','temario','unidad','materia'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {    $temarioUnlink = Contenido::find($id);
        Contenido::destroy($id);
        //unlink(url('/').'/pdf/'.$temarioUnlink->pdf);
        return back()->with('delete', 'Contenido eliminado correctamente');
    }
}
