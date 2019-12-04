<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Producto;
use App\Categoria;

class SearchController extends Controller
{
    public function buscador(Request $request)
    {
      $busqueda = Producto::where("nombre","like",$request->texto."%")->take(10)->get();
      return view('index', compact('busqueda'));
    }
}
