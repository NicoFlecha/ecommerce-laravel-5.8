@extends('layouts/ecommerce')

@section('title')
  Carrito
@endsection

@section('css')
  '/css/carrito.css'
@endsection

@section('principal')
  @forelse ($productos as $producto)
    <div class="producto">
      <p>{{$producto->productos->nombre}} - {{$producto->cantidad}} - Total: ${{$producto->productos->precio * $producto->cantidad}}</p>
      <form class="" action="/eliminarCarrito" method="post">
        @csrf
        <input class="producto_id" type="text" name="carrito_id" value="{{$producto->id}}">
        <button class='eliminar' type="submit">Sacar del Carrito</button>
      </form>
    </div>
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
    <div class="">
      <p>Total del Carrito: $ {{$total}}</p>
      <form action="/comprar" method="post">
        @csrf
        @foreach ($productos as $producto)
          <input type="text" name="compra[]" value='{"id":{{$producto->productos->id}},"nombre":"{{$producto->productos->nombre}}","precio":{{$producto->productos->precio}},"cantidad":{{$producto->cantidad}}}'>
        @endforeach
        <button type="submit">Comprar</button>
      </form>
    </div>
  @endif
@endsection
