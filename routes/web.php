<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'HomeController@inicio_invitado')->name('inicio');

//Route::get('ciclos/{id}', 'MateriaController@ciclo')->name('ciclos');
//Route::get('materias-ciclo/{id}/{ciclo}', 'MateriaController@materias_ciclo')->name('materias-ciclo');
Route::resource('productos','ProductoController');

Route::resource('materias','MateriaController');
Route::resource('unidades','UnidadController');
Route::resource('temarios','TemarioController');
Route::resource('contenidos','ContenidoController');
Route::resource('keys','KeyController');
Route::resource('carreras','CarreraController');
Route::resource('colaboradores','ColaboradorController');
