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

Route::get('/', 'ProductoController@mostrar');

Route::get('/faq', function () {
    return view('faq');
});

Route::get('/search', function () {
    return view('search');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/register', function () {
    return view('register');
});

Route::get('/perfil/editar', 'PerfilController@editarPerfil');
Route::post('/perfil/editar', 'PerfilController@actualizar');

Route::get('/carrito', 'CarritoController@mostrarProductos');

Route::get('/search', 'SearchController@buscador');

Route::get('/perfil', 'UserController@mostrarPerfil');

Route::get('/categorias', 'CategoriaController@mostrar');

Route::get('/categorias/editar', 'CategoriaController@elegir')->middleware('admin');

Route::get('/categorias/editar/{id}', 'CategoriaController@editar')->middleware('admin');

Route::get('/categorias/agregar', 'CategoriaController@agregar')->middleware('admin');

Route::post('/categorias/editar', 'CategoriaController@guardar')->middleware('admin');

Route::post('/categorias/eliminar', 'CategoriaController@eliminar')->middleware('admin');

Route::get('/productos/agregar', 'ProductoController@agregar')->middleware('admin');

Route::post('/productos/agregar', 'ProductoController@guardar')->middleware('admin');

Route::get('/categorias/{id}', 'CategoriaController@mostrarProductos');

Route::get('/productos/{id}', 'ProductoController@mostrarProducto');

Route::get('/marcas', 'MarcaController@mostrar');

Route::get('/marcas/editar', 'MarcaController@elegir')->middleware('admin');

Route::get('/marcas/editar/{id}', 'MarcaController@editar')->middleware('admin');

Route::get('/marcas/agregar', 'MarcaController@agregar')->middleware('admin');

Route::post('/marcas/editar', 'MarcaController@guardar')->middleware('admin');

Route::post('/marcas/eliminar', 'MarcaController@eliminar')->middleware('admin');

Route::get('/marcas/{id}', 'MarcaController@mostrarProductos');

Route::post('/agregarCarrito', 'UserController@agregarCarrito');

Route::post('/eliminarCarrito', 'CarritoController@eliminarProducto');

Auth::routes();
