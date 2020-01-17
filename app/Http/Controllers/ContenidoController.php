<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Contenido;
use App\Materia;
use App\Unidad;
use App\Temario;
use App\Key;
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
        $t = Temario::find($request->temario);
        $u = Materia::find($t->unidad_id);
        $materia = Materia::find($u->materia_id);
        if($request->op =="pdf"){

           // $file  = $request->file('file');
           // $name = time().$file->getClientOriginalName();
           //  $file->move(public_path().'/pdf',$name);
            Helping::subir_Archivo($request, 'pdf/'.$materia->siglas, $materia->siglas.'/');

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
    {
        if($request->oculto == "pdf"){
            
            if($request->file == null){
              //no subiremos nada ni actualizaremos el archivo.
                echo "no";
            }else{
              $contenido =  Contenido::find($id);
              $materia = Materia::find($request->materia);
              Storage::disk('public')->delete('pdf/'.$contenido->pdf);
              $name =  Helping::subir_Archivo($request, 'pdf/'.$materia->siglas, $materia->siglas.'/');
              Contenido::where('id', $id)
              ->update([
                    'titulo' => $request->tema,
                    'descripcion' => $request->des,
                    'pdf' =>$name,
                    'vistas' => $contenido->vistas,
                    'temario_id' => $request->temasxd
                  ]);
             //Storage::disk('public')->delete('folder_path/file_name.jpg');
             // $da = Storage::disk('public')->makeDirectory('pdf/p1p');
            }
        }else{

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
    {    $temarioUnlink = Contenido::find($id);
        Contenido::destroy($id);
        //unlink(url('/').'/pdf/'.$temarioUnlink->pdf);

        Storage::disk('public')->delete('pdf/'.$materia->siglas.'/'.$contenido->pdf);
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
