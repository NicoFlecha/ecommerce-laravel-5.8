<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Producto;
use App\Categoria;

class SearchController extends Controller
{
    public function buscador(Request $request)
    {
      $busquedas = Producto::where("nombre","like",'%' . $request->busqueda . '%')->take(6)->get();
      return view('search', compact('busquedas'));
    }
}
