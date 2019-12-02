<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Marca;
use App\Producto;

class MarcaController extends Controller
{
  public function mostrar()
  {
    // Trae todas las marcas
    $marcas = Marca::all();
    // Las devuelve a la vista Marca
    return view('marca', compact('marcas'));
  }

  // Trae todas las marcas y las devuelve a la vista MarcaElegir
  public function elegir()
  {
    // Trae todas las marcas
    $marcas = Marca::all();
    // Las devuelve a la vista MarcaElegir para poder elegir alguna
    return view('marcaElegir', compact('marcas'));
  }

  // Trae la categoria según el id y la devuelve a la vista MarcaEditar
  public function editar($id)
  {
    // Trae la marca según el id
    $marca = Marca::find($id);
    // La devuelve a la vista MarcaEditar
    return view('marcaEditar', compact('marca'));
  }

  // Devuelve la vista marcaAgregar
  public function agregar()
  {
    return view('marcaAgregar');
  }

  // Actualiza ó Guarda la marca y redirige a la ruta /marcas
  public function guardar(Request $form)
  {
    // Instancia una nueva Marca
    $marca = new Marca();
    // Verifica si por el formulario llega algún id
    if (Marca::find($form['id'])) {
    // Sí llega algún id es porque se está modificando una Marac
      $marca = Marca::find($form['id']);
    }
    // Asigna/Actualiza valores de los atributos de Marca
    $marca->id = $form['id'];
    $marca->nombre = $form['nombre'];
    $marca->imagen = $form['imagen'];
    // Guarda/Actualiza la Marca
    $marca->save();
    // Redirije a la ruta /marcas
    return redirect('/marcas');
  }

  // ELimina de la BBDD la marca elegida
  public function eliminar(Request $form)
  {
    // Recibe el id de la marca a eliminar
    $marca = Marca::find($form['id']);
    // Elimina la marca de la BBDD
    $marca->delete();
    // Redirije a la ruta /marcas
    return redirect('/marcas');
  }

  public function mostrarProductos($id)
  {
    $productos = Producto::where('marca_id', '=', $id)->paginate(2);
    return view('index', compact('productos'));
  }
}
