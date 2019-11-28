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
      $productos = Producto::paginate(6);
      return view('index', compact('productos'));
    }

    // Método agregar
    public function agregar()
    {
      $categorias = Categoria::all();
      $marcas = Marca::all();

      // Muestra la vista para agregar un producto la cual debe tener un formulario, la ruta es '/productos/agregar', y debe tener el middleware admin
      return view('productoAgregar', compact('categorias', 'marcas'));
    }

    // Método guardar
    public function guardar(Request $form) // Toma lo que venga por Post de la ruta '/productos/agregar'
    {
      // Asigna los valores a un objeto de clase Producto
      $producto = new Producto;
      $producto->nombre = $form['nombre'];
      $producto->categoria_id = $form['categoria_id'];
      $producto->marca_id = 1;
      $producto->precio = $form['precio'];
      $producto->cantidad = $form['cantidad'];
      $producto->descripcion = $form['descripcion'];

      // Guarda el Producto en la BBDD
      $producto->save();

      // Regresa una redirección a la ruta '/home'
      return redirect('/');
    }

    public function mostrarProducto($id)
    {
      $producto = Producto::find($id);
      return view('verProducto', compact('producto'));
    }
}
