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

Route::get('/', function () {
    return view('layouts.principal');
});
Route::get('login','logincontroller@index');
Route::get('admin','logincontroller@admin');
Route::group(['middleware' =>['auth','mdd_admin']], function (){
    Route::post('Regis','usuariocontroler@registro');
    Route::get('getUser','usuariocontroler@getUser');
    Route::get('Actualizar/{idusuarios}','usuariocontroler@Actualizar');
    Route::post('UpdateClien/{idusuarios}','usuariocontroler@UpdateClien');
    Route::get('listarUser','usuariocontroler@listarUser');

});
Route::group(['middleware' =>['auth','mdd_user']], function (){


});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('registrar','usuariocontroler@getRegistro');
/*funcion Habitacion*/
Route::resource('habitacion','habitacioncontroller');
Route::get('gestionar_habitacion','habitacioncontroller@mostrarHabitaciones');
/*funcion piso*/
Route::resource('Piso','pisocontroller');
Route::get('cargarPiso/{id_niveles}','pisocontroller@cargarData');
Route::post('update/{id_niveles}','pisocontroller@actualizar');

/*funcion cliente*/
Route::resource('Cliente','clientecontroller');
Route::post('registrar','clientecontroller@regsitro');
Route::get('cliente','clientecontroller@cliente');
Route::get('listarcliente','clientecontroller@listarcliente');
Route::get('listaedesactivado','clientecontroller@listaedesactivado');
Route::get('cargarCliente/{idcliente}','clientecontroller@cargarDatos');
Route::post('update/{idcliente}','clientecontroller@actualizar');
Route::get('Activar/{idcliente}','clientecontroller@Activar');
Route::get('Desactivar/{idcliente}','clientecontroller@Desactivar');
/*Route::get(' /{slug?}','logincontroller@admin');*/

/*funcion tipo habitacion*/

Route::resource('tipo_Cliente','tipocontroller');
Route::get('cargar/{idcategorias}','tipocontroller@cargarData');
Route::post('actualizar/{idcategorias}','tipocontroller@Actualizar');


