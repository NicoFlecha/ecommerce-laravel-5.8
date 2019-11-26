<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Categoria;

class CategoriaController extends Controller
{
    // Trae todas las categorias y las devuelve a la vista Categoria
    public function mostrar()
    {
      // Trae todas las categorias
      $categorias = Categoria::all();
      // Las devuelve a la vista Categoria
      return view('categoria', compact('categorias'));
    }

    // Trae todas las categorias y las devuelve a la vista CategoriaElegir
    public function elegir()
    {
      // Trae todas las categorias
      $categorias = Categoria::all();
      // Las devuelve a la vista CategoriaElegir para poder elegir alguna
      return view('categoriaElegir', compact('categorias'));
    }

    // Trae la categoria según el id y la devuelve a la vista CategoriaEditar
    public function editar($id)
    {
      // Trae la categoria según el id
      $categoria = Categoria::find($id);
      // La devuelve a la vista CategoriaEditar
      return view('categoriaEditar', compact('categoria'));
    }

    // Devuelve la vista categoriaAgregar
    public function agregar()
    {
      return view('categoriaAgregar');
    }

    // Actualiza ó Guarda la categoría y redirige a la ruta /categorias
    public function guardar(Request $form)
    {
      // Instancia una nueva Categoría
      $categoria = new Categoria();
      // Verifica si por el formulario llega algún id
      if (Categoria::find($form['id'])) {
      // Sí llega algún id es porque se está modificando una Categoría
        $categoria = Categoria::find($form['id']);
      }
      // Asigna/Actualiza valores de los atributos de Categoria
      $categoria->id = $form['id'];
      $categoria->nombre = $form['nombre'];
      $categoria->icon = $form['icon'];
      // Guarda/Actualiza la Categoría
      $categoria->save();
      // Redirije a la ruta /categorias
      return redirect('/categorias');
    }

    // ELimina de la BBDD la categoría elegida
    public function eliminar(Request $form)
    {
      // Recibe el id de la categoría a eliminar
      $categoria = Categoria::find($form['id']);
      // Elimina la categoría de la BBDD
      $categoria->delete();
      // Redirije a la ruta /categorias
      return redirect('/categorias');
    }
}
