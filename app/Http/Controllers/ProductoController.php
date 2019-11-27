<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Producto;

class ProductoController extends Controller
{
    public function mostrar()
    {
      $productos = Producto::all();
      return view('index', compact('productos'));
    }
}
