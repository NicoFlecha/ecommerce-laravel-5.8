@extends('layouts/ecommerce')

@section('title')
  Carrito
@endsection

@section('css')
  '/css/carrito.css'
@endsection

@section('principal')
  @forelse ($productos as $producto)
    <p>{{$producto->productos->nombre}} - {{$producto->cantidad}} - Total: ${{$producto->productos->precio * $producto->cantidad}}</p>
    <form class="" action="/eliminarCarrito" method="post">
      @csrf
      <input type="text" name="carrito_id" value="{{$producto->id}}">
      <input type="submit">
    </form>
    <br>
  @empty
    <div class="contenedorCarrito">
      <h2>Tu Carrito está vacío</h2>
      <div class="imgCarrito">
        <i class="fas fa-shopping-basket"></i>
      </div>
    </div>
  @endforelse
  @if ($productos->count())
    @php
      $total = 0;
    @endphp
    @foreach ($productos as $producto)
      @php
        $total = $total + $producto->productos->precio * $producto->cantidad;
      @endphp
    @endforeach
    <p>Total del Carrito: $ {{$total}}</p>
  @endif
@endsection
