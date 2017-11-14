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
    return view('welcome');
})->name('home');

Route::post('/checkLogin', 'UsersController@check')->name('checkLogin');

Route::get('/usuarios_activos', 'UsersController@showG')->name('usuariosActivos');

Route::get('/login/{error?}', ['middleware' => 'UAM',
							   'uses' => 'UsersController@login'])->name('login');

Route::get('/partidas_terminadas', 'UsersController@showPT')->name('partidasTerminadas');

Route::get('/score', 'UsersController@showScore')->name('score');

Route::get('/cerrar_sesion', function() {
	session_start();
	session_destroy();
	return redirect("/");
})->name('cerrarSesion');
