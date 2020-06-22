<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'HomeController@index')->middleware('auth');
Route::get('/clientes/menu', function () {
    return view('clientes.menu');
})->middleware('auth');

Auth::routes();
Route::resource('clientes', 'ClientesController')->middleware('auth');
Route::resource('usuarios', 'UsuariosController')->middleware('auth');
Route::resource('planes', 'PlanesController')->middleware('auth');
Route::resource('pagos', 'PagosController')->middleware('auth');
Route::get('/verificar',function(){
    return view('auth.verify');
});
Route::get('/verpagos', 'PagosController@verpagos')->middleware('auth');
Route::get('/redireccionar', 'PagosController@redireccionar')->middleware('auth');
Route::get('/pdf', 'PagosController@pdf')->middleware('auth');
Route::get('/pagos/fill/{pago}', 'PagosController@llenado')->middleware('auth');
Route::get('/home', 'HomeController@index')->name('home');
