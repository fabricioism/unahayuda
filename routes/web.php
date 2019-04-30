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

/*INDEX PAGE*/
Route::get('/index', "PaginasController@index")->name('index');

#ARTICULO
Route::resource('/encargados/articulo', 'ArticuloControllerE');

#TAREA
Route::resource('/encargados/tarea', 'TareaControllerE');

#ASIGNACION
Route::resource('/encargados/asignacion', 'AsignacionControllerE');

#A_CARGO_DE
Route::resource('/encargados/a_cargo_de', 'CargoControllerE');

#CONTENIDO
Route::resource('/encargados/contenido', 'ContenidoControllerE');

#ENCARGADO
Route::resource('/encargados/encargado', 'EncargadoControllerE');

#LISTA
Route::resource('/encargados/lista', 'ListaControllerE');

#PAQUETE
Route::resource('/encargados/paquete', 'PaqueteControllerE');

#ROL
Route::resource('/encargados/rol', 'RolControllerE');

#STATUS
Route::resource('/encargados/status', 'StatusControllerE');

#TIPO
Route::resource('/encargados/tipo', 'TipoControllerE');

#Voluntario
Route::resource('/encargados/voluntario', 'VoluntarioControllerE');

#Route::get('/encargado/articulo/crear', "ArticuloController@create")->name('crearArticuloController');
#Route::get('/encargado/articulo/actualizar', "ArticuloController@update")->name('actualizarArticuloController');

#TAREA
Route::get('/encargado/tarea/crear', "TareaControllerE@create")->name('crearTareaController');

#ASIGNACION
Route::get('/encargado/asignacion/crear', "AsignacionController@create")->name('crearAsignacionController');

#PAQUETE
Route::get('/encargado/paquete/crear', "PaqueteController@create")->name('crearPaqueteController');

#ENCARGADO
Route::get('/encargado/encargado/crear', "EncargadoController@create")->name('crearEncargadoController');

#Voluntario
Route::get('/encargado/voluntario/crear', "VoluntarioController@create")->name('crearVoluntarioController');

#CONTENIDO
Route::get('/encargado/contenido/crear', "ContenidoController@create")->name('crearContenidoController');

#ROL
Route::get('/encargado/rol/crear', "RolController@create")->name('crearRolController');

#Lista
Route::get('/encargado/lista/crear', "ListaController@create")->name('crearListaController');

#Tipo
Route::get('/encargado/tipo/crear', "TipoController@create")->name('crearTipoController');

#Status
Route::get('/encargado/status/crear', "StatusController@create")->name('crearStatusController');

#A_CARGO_DE
Route::get('/encargado/a_cargo_de/crear', "CargoController@create")->name('crearCargoController');

#WELCOME
Route::get('/', function(){
	return view ('welcome');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
