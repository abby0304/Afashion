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
});

Route::get('/inicio', function () {
    return view('inicio');
});

Route::get('/busqueda', function () {
    return view('busqueda');
});


Route::get('/usuario', function () {
    return view('usuario');
});

//Registro y login :)
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Agregar imagen 
//Route::get('/agregar', 'articleController@index');

Route::resource('article', 'articleController');

Route::resource('usuario', 'usuarioController');

Route::resource('perfil', 'perfilController');

Route::resource('comment', 'commentController');

Route::resource('heart', 'heartController');

Route::resource('buscar', 'busquedaController');

//Route::get('perfil/{id}', 'perfilController@show');
