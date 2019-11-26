<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Categoria;

class CategoriaController extends Controller
{
    public function mostrar()
    {
      $categorias = Categoria::all();
      return view('categoria', compact('categorias'));
    }

    public function elegir()
    {
      $categorias = Categoria::all();
      return view('categoriaElegir', compact('categorias'));
    }

    public function editar($id)
    {
      $categoria = Categoria::find($id);
      return view('categoriaEditar', compact('categoria'));
    }

    public function agregar()
    {
      return view('categoriaAgregar');
    }

    public function guardar(Request $form)
    {
      $categoria = new Categoria();
      if (Categoria::find($form['id'])) {
        $categoria = Categoria::find($form['id']);
      }
      $categoria->id = $form['id'];
      $categoria->nombre = $form['nombre'];
      $categoria->icon = $form['icon'];

      $categoria->save();


      return redirect('/categorias');
    }

    public function eliminar(Request $form)
    {
      $categoria = Categoria::find($form['id']);

      $categoria->delete();


      return redirect('/categorias');
    }
}
