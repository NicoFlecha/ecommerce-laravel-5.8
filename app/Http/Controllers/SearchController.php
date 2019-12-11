<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Producto;
use App\Categoria;
use App\Imagen;

class SearchController extends Controller
{
    public function buscador(Request $request)
    {
      $busquedas = Producto::where("nombre","like",'%' . $request->busqueda . '%')->take(6)->get();
      $busqueda = $request->busqueda;
      return view('search', compact('busquedas','busqueda'));
    }

    public function buscadorApi($busqueda)
    {
      $busquedas = Producto::where("nombre","like",'%' . $busqueda . '%')->take(6)->with('imagenes')->get();

      return json_encode($busquedas);

    }

}
