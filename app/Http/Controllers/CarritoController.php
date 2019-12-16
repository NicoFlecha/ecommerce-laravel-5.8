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

  public function eliminarProducto(Request $form)
  {

    $producto = Carrito::find($form->carrito_id);
    $producto->delete();

    return redirect('/carrito');
  }

  public function comprar(Request $carrito)
  {

    foreach ($carrito['compra'] as $compraJSON) {
      $compra = json_decode($compraJSON, true);
      $producto = Producto::find($compra['id']);
      $producto->cantidad -= $compra['cantidad'];
      $producto->save();
      $carrito = Carrito::where('usuario_id', '=', Auth::user()->id)->where('producto_id', '=', $compra['id'])->first();
      // dd($carrito);
      $carrito->delete();
    }
    return redirect('/');
  }

}
