<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Producto;
use App\Key;
use App\Imagen;
use App\Help\Helping;
use Image;
use Illuminate\Support\Facades\Storage;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos = Producto::all();
        return view('MarketPlace.ventas', compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {




      $p = Producto::create([
        'titulo'=> $request->titulo,
        'precio'=> $request->precio,
        'fecha' => date("d").'-'.date("m").'-'.date('Y'),
        'descripcion'=> $request->des,
        'whatsapp'=> $request->ws,
        'nombre'=> $request->nombre,
        'estado' =>'publicado',
        'principal' =>'no',
      ]);

        for ($i=0; $i < count($request->fotos) ; $i++) {

          $image = Image::make($request->fotos[$i]);
          $image->resize(500, 500);
          //$image->resizeCanvas(500, 500);
          $file = $request->fotos[$i];
          $original = Helping::reemplazar_caracter(" ","-", $file->getClientOriginalName());
          $name = Helping::code_().'-'.time().$original;
        //  $file->move(public_path().'/'.'uploads/',$name);

          $image->save('uploads/'.$name);

          //subimos las img a la bd
          $img = Imagen::create([
            'url'=> $name,
            'producto_id'=> $p->id,
          ]);

          if($i == 0){
            Producto::where('id', $p->id)
            ->update([
                'principal' => $name,
            ]);
          }
        }

        return back()->with('success', 'Producto agregado correctamente');
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
        //
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
    {
         // $materia = Materia::find($u->materia_id);

          $imgs = Imagen::where('producto_id', $id)->get();
          Producto::destroy($id);

         foreach ($imgs as $key => $value) {
           Storage::disk('public')->delete('uploads/'.$value->url);
         }
          return back()->with('delete', 'Contenido eliminado correctamente');
    }


    //API
    public function obtener_Productos($key){
        $key = Key::where('llave', $key)->get();
        if(count($key)>0){
          return Producto::where('estado', 'publicado')->get();
        }else{
          return [];
        }
    }

    public function obtener_imagenes($id, $key){
       $key = Key::where('llave', $key)->get();
        if(count($key)>0){
           return Imagen::where('producto_id', $id)->get();
        }else{
          return [];
        }
    }
}
