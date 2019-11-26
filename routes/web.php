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

Route::get('/', 'HomeController@index');

Route::get('/faq', function () {
    return view('faq');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/register', function () {
    return view('register');
});

Route::get('/carrito', function () {
    return view('carrito');
});

Route::get('/perfil', 'UserController@mostrarPerfil');

Route::get('/categorias', 'CategoriaController@mostrar');

Route::get('/categorias/editar', 'CategoriaController@elegir')->middleware('admin');

Route::get('/categorias/editar/{id}', 'CategoriaController@editar')->middleware('admin');

Route::get('/categorias/agregar', 'CategoriaController@agregar')->middleware('admin');

Route::post('/categorias/editar', 'CategoriaController@guardar')->middleware('admin');

Route::post('/categorias/eliminar', 'CategoriaController@eliminar')->middleware('admin');


Auth::routes();
