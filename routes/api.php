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
Route::get('getMaterias/{key}', 'MateriaController@obtener_materias')->name('getMaterias');
Route::get('unidadesByMateria/{id}/{key}', 'UnidadController@unidadesByMateria')->name('unidadesByMateria');
Route::get('temariosByUnidades/{id}/{key}', 'TemarioController@temariosByUnidades')->name('temariosByUnidades');
Route::get('contenidos/{id}/{key}', 'ContenidoController@contenidos')->name('contenidos');
Route::get('vistas/{id}/{key}', 'ContenidoController@vistas')->name('vistas');
