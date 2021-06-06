<?php
use Illuminate\Http\Request;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('getCarreras/{key}', 'CarreraController@carreras')->name('getCarreras');

Route::get('getColaboradores/{key}', 'ColaboradorController@listar_colaboradores')->name('getColaboradores');

Route::get('getMaterias/{id}/{key}', 'MateriaController@materiaByCarrera')->name('getMaterias');
Route::get('buscarMateriaByCarrera/{id}/{arg}/{key}', 'MateriaController@like_materiaByCarrera')->name('buscarMateriaByCarrera');
Route::get('likeMateria/{arg}/{key}', 'MateriaController@like_materiaByCarrera')->name('likeMateria');



Route::get('unidadesByMateria/{id}/{key}', 'UnidadController@unidadesByMateria')->name('unidadesByMateria');
Route::get('temariosByUnidades/{id}/{key}', 'TemarioController@temariosByUnidades')->name('temariosByUnidades');
Route::get('contenidos/{id}/{key}', 'ContenidoController@contenidos')->name('contenidos');
Route::get('contenido/{id}/{key}', 'ContenidoController@contenido')->name('contenido');
Route::get('contenido/pdf/{id}/{key}', 'ContenidoController@urlPdf')->name('contenido-urlPdf');

Route::get('contenidos/like/{string}/{key}', 'ContenidoController@contenidosLike')->name('contenidos-link');


Route::get('vistas/{id}/{key}', 'ContenidoController@vistas')->name('vistas');

Route::get('getProductos/{key}', 'ProductoController@obtener_Productos')->name('getProductos');
Route::get('getPictures/{id}/{key}', 'ProductoController@obtener_imagenes')->name('getPictures');
