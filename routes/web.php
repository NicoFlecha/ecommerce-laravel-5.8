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

Route::get('/categorias', 'CategoriaController@mostrar');

Route::get('/categorias/editar', 'CategoriaController@formulario');

Route::get('/categorias/editar/{id}', 'CategoriaController@editar');

Auth::routes();
