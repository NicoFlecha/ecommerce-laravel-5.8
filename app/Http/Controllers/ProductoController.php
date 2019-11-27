<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Producto;
use App\Categoria;
use App\Marca;

class ProductoController extends Controller
{
    public function mostrar()
    {
      $productos = Producto::all();
      return view('index', compact('productos'));
    }

    // Método agregar
    public function agregar()
    {
      $categorias = Categoria::all();
      $marcas = Marca::all();

      return view('productoAgregar', compact('categorias', 'marcas'));
    }
    // Muestra la vista para agregar un producto la cual debe tener un formulario, la ruta es '/productos/agregar', y debe tener el middleware admin

    // Método guardar
    // Toma lo que venga por Post de la ruta '/productos/agregar'
    // Guarda la info la BBDD
    // Regresa una redirección a la ruta '/home'
}
