<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Carrito;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function mostrarPerfil()
    {

      return view('perfil');

    }

    public function agregarCarrito(Request $producto) {

      $carrito = new Carrito;
      $carrito->producto_id = $producto->producto_id;
      $carrito->usuario_id = Auth::user()->id;
      $carrito->cantidad = $producto->cantidad;
      $carrito->save();

      return redirect('/carrito');

    }
}
