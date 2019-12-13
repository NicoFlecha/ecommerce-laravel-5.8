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
      $repetido = Carrito::where('usuario_id', '=', Auth::user()->id)->where('producto_id', '=', $producto->producto_id)->get();
      if (isset($repetido[0])) {
        $repetido[0]->cantidad = $carrito->cantidad;
        $repetido[0]->save();
        return redirect('/carrito');
      }
      $carrito->save();

      return redirect('/carrito');

    }
}
