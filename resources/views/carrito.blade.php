@extends('layouts/authLayout')

@section('title')
  Carrito
@endsection

@section('css')
  '/css/carrito.css'
@endsection

@section('principal')
  @forelse ($productos as $producto)
    {{$producto->productos->nombre}}<br>
  @empty
    <div class="contenedorCarrito">
      <h2>Tu Carrito está vacío</h2>
      <div class="imgCarrito">
        <i class="fas fa-shopping-basket"></i>
      </div>
    </div>
  @endforelse
@endsection
