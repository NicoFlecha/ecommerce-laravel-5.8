@extends('layouts/ecommerce')

@section('title')
  Carrito
@endsection

@section('css')
  '/css/carrito.css'
@endsection

@section('principal')
    <div class="contenedor">
      <div class="productos">
        @forelse ($productos as $producto)
        <div class="producto">
          <div class="img-producto">
            <img src="/storage/{{$producto->productos->imagenes->first()->ruta}}" alt="{{$producto->productos->nombre}}">
          </div>
          <div class="texto-producto">
            <h3 class="nombre-producto">
              <a href="/productos/{{$producto->productos->id}}">
                {{$producto->productos->nombre}}
              </a>
            </h3>
            <p>{{$producto->cantidad}} x ${{$producto->productos->precio}}</p>
            <p class="subtotal">Subtotal: <span class="subtotal-precio">${{$producto->productos->precio * $producto->cantidad}}</span></p>
          </div>
          <form class="" action="/eliminarCarrito" method="post">
            @csrf
            <input class="producto_id" type="text" hidden name="carrito_id" value="{{$producto->id}}">
            <button class='eliminar' type="submit"><i class="fas fa-trash"></i></button>
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
    </div>
    @if ($productos->count())
      @php
      $total = 0;
      @endphp
      @foreach ($productos as $producto)
        @php
        $total = $total + $producto->productos->precio * $producto->cantidad;
        @endphp
      @endforeach
      <div class="total">
        <p class="texto-total">Total del Carrito: <span class="precio-total">$ {{$total}}</span></p>
        <form action="/comprar" method="post">
          @csrf
          @foreach ($productos as $producto)
            <input type="text" hidden class="no-mostrar" name="compra[]" value='{"id":{{$producto->productos->id}},"nombre":"{{$producto->productos->nombre}}","precio":{{$producto->productos->precio}},"cantidad":{{$producto->cantidad}}}'>
          @endforeach
          <button id="comprar" type="submit">Comprar</button>
        </form>
      </div>
    </div>
  @endif
@endsection
