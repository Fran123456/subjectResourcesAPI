<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Contenido;
use App\Materia;
use App\Unidad;
use App\Temario;
use App\Key;
use App\Carrera;
use App\Help\Helping;

class ContenidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth')->except('vistas','contenidos','contenido','urlPdf');
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
        $t = Temario::find($request->temario);
        $u = Unidad::find($t->unidad_id);
        $materia = Materia::find($u->materia_id);
        if($request->op =="pdf"){

           // $file  = $request->file('file');
           // $name = time().$file->getClientOriginalName();
           //  $file->move(public_path().'/pdf',$name);
           $name =  Helping::subir_Archivo($request, 'pdf/'.$materia->siglas, $materia->siglas.'/');

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
        $carrera = Carrera::find($materia->carrera_id);
        $contenidoVideo = Contenido::where('temario_id', $id)->where('video','!=', null)->get();
        $contenidoPDF = Contenido::where('temario_id', $id)->where('pdf','!=', null)->get();
        return view('contenido.contenido', compact('contenidoVideo','contenidoPDF','temario','unidad','materia','carrera'));
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $contenido = Contenido::find($id);
       $tema = Temario::find($contenido->temario_id);
       $temas = Temario::where('unidad_id', $tema->unidad_id)->get();
       $unidad = Unidad::find($tema->unidad_id);

       $materia = Materia::find($unidad->materia_id);
       return view('contenido.contenido_edit', compact('contenido','tema','temas','materia'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {   $contenido =  Contenido::find($id);
        if($request->oculto == "pdf"){

            if($request->file == null){
              //no subiremos nada ni actualizaremos el archivo.
                Contenido::where('id', $id)
                ->update([
                    'titulo' => $request->tema,
                    'descripcion' => $request->des,
                    'temario_id' => $request->temasxd
                ]);
            }else{

              $materia = Materia::find($request->materia);
              Storage::disk('public')->delete('pdf/'.$contenido->pdf);

              $name =  Helping::subir_Archivo($request, 'pdf/'.$materia->siglas, $materia->siglas.'/');
              Contenido::where('id', $id)
              ->update([
                    'titulo' => $request->tema,
                    'descripcion' => $request->des,
                    'pdf' =>$name,
                    'temario_id' => $request->temasxd
                  ]);
            }
        }else{
             Contenido::where('id', $id)
              ->update([
                    'titulo' => $request->tema,
                    'descripcion' => $request->des,
                    'video' =>$request->embebido,
                    'url' => $request->url
                  ]);
        }

       return redirect()->route('contenidos.show',$contenido->temario_id)->with('edit', 'Contenido editado correctamente');
    }

    /**
     * Remove the specified resourcreqe from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   $contenidoUnlink = Contenido::find($id);
        $t = Temario::find($contenidoUnlink->temario_id);
        $u = Unidad::find($t->unidad_id);
        $m = Unidad::find($u->materia_id);
       // $materia = Materia::find($u->materia_id);
        Contenido::destroy($id);


        Storage::disk('public')->delete('pdf/'.$m->siglas.'/'.$contenidoUnlink->pdf);
        return back()->with('delete', 'Contenido eliminado correctamente');
    }


    //API
    public function contenidos($id, $key){

        $key = Key::where('llave', $key)->get();
        if(count($key)>0){
            return Contenido::where('temario_id', $id)->get();
        }else{
          return [];
        }

    }


    public function contenido($id, $key){

        $key = Key::where('llave', $key)->get();
        if(count($key)>0){
            $c= Contenido::find($id);
            if($c->pdf !=null) $c->pdf = $this->urlPdf($id, $key);
            return $c;
        }else{
            return Contenido::find(0);
        }

    }

    public function urlPdf($id, $key){
       $key = Key::where('llave', $key)->get();
        $c = Contenido::find($id);
        return url('/').'/pdf/'.$c->temario->unidad->materia->siglas.'/'.$c->pdf;
    }

    public function vistas($id, $key){

        $key = Key::where('llave', $key)->get();
        if(count($key)>0){
            $aux[0] = Contenido::where('pdf', $id)->first();
            if($aux[0] != null){
                $valor  = $aux[0]->vistas + 1;
                Contenido::where('pdf', $id)->update(['vistas' => $valor]);

            }else{

                 $id = "https://youtu.be/".$id;
                // print_r($id);
                 $aux[0] = Contenido::where('url', $id)->first();
                 if($aux[0]  !=null ) {
                     $valor  = $aux[0]->vistas + 1;
                     Contenido::where('url', $id)->update(['vistas' => $valor]);
                 }

            }

        }else{

        }

    }


}
