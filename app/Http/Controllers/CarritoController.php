<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Carrito;
use App\Producto;
use Illuminate\Support\Facades\Auth;

class CarritoController extends Controller
{

  public function mostrarProductos()
  {

    $productos = Carrito::where('usuario_id', '=', Auth::user()->id)->with('productos')->get();
    // dd($carritos);
    return view('carrito', compact('productos'));
    
  }

}
