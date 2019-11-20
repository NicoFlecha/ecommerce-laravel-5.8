<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Categoria;

class CategoriaController extends Controller
{
    public function mostrar()
    {
      $categorias = [
        ['id' => 1, 'nombre' => 'celulares', 'icon' => "fas fa-mobile"],
        ['id' => 2, 'nombre' => 'desktop', 'icon' => "fas fa-desktop"],
        ['id' => 3, 'nombre' => 'smartwatch', 'icon' => "fas fa-clock"],
        ['id' => 4, 'nombre' => 'tablet', 'icon' => "fas fa-tablet"]
      ];
      return view('categoria', compact('categorias'));
    }

    public function formulario()
    {
      $categorias = [
        ['id' => 1, 'nombre' => 'celulares', 'icon' => "fas fa-mobile"],
        ['id' => 2, 'nombre' => 'desktop', 'icon' => "fas fa-desktop"],
        ['id' => 3, 'nombre' => 'smartwatch', 'icon' => "fas fa-clock"],
        ['id' => 4, 'nombre' => 'tablet', 'icon' => "fas fa-tablet"]
      ];
      return view('categoriaElegir', compact('categorias'));
    }

    public function editar($id)
    {
      $categorias = [
        ['id' => 1, 'nombre' => 'celulares', 'icon' => "fas fa-mobile"],
        ['id' => 2, 'nombre' => 'desktop', 'icon' => "fas fa-desktop"],
        ['id' => 3, 'nombre' => 'smartwatch', 'icon' => "fas fa-clock"],
        ['id' => 4, 'nombre' => 'tablet', 'icon' => "fas fa-tablet"]
      ];
      foreach ($categorias as $categoria) {
        if ($categoria['id'] == $id) {
          $categoria = $categoria;
          break;
        }
      }
      return view('categoriaEditar', compact('categoria'));
    }
}
