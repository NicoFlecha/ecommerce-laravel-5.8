@extends('/layouts/ecommerce')
@section('title')
  {{$producto->nombre}}
@endsection

@section('css')

'/css/producto.css'

@endsection

@section('principal')
  <div class="producto">
    <div class="tablet">
      <div class="imagenes">
        <button type="button" class="control-carrousel" id="anterior"><i class="fas fa-arrow-left"></i></button>
        @foreach ($producto->imagenes as $imagen)
          <img class= 'imgProducto' src="/storage/{{$imagen->ruta}}" alt="">
        @endforeach
        <button type="button" class="control-carrousel" id="siguiente"><i class="fas fa-arrow-right"></i></button>
      </div>
      <div class="derecha">
        <div class="texto-producto">
          <h1>{{$producto->nombre}}</h1>
          <h2>$ {{$producto->precio}}</h3>
            @if ($producto->cantidad == 1)
              <p class="stock ultimo">¡Último Disponible!</p>
            @elseif ($producto->cantidad > 1)
              <p class="stock">Hay Stock</p>
            @else
              <p class="stock sin">Sin Stock</p>
            @endif
            <h3>Descripción</h3>
            <p class="descripcion">{{$producto->descripcion}}</p>
          </div>
        <div class="marca">
          <div class="marca-img">
            <img src="{{$producto->marca->imagen}}" alt="{{$producto->marca->nombre}}">
          </div>
        </div>
        </div>
    </div>
    @guest
      <a href="/login"><button type="button" class="agregar" name="button">Agregar al Carrito</button></a>
    @else
      <form class="agregar-carrito" action="/agregarCarrito" method="post">
        @csrf
        <input type="text" name="producto_id" value="{{$producto->id}}" class="producto_id">
        <div class="cantidad-container">
          <div class="form-cantidad">
            <label for="cantidad">Cantidad:</label>
            <input type="number" name="cantidad" id="cantidad" value="1">
            <button type="button" class="control-cantidad" id="restar">-</button>
            <button type="button" class="control-cantidad" id="sumar">+</button>
          </div>
          <div class="error-cantidad"></div>
        </div>
        <button type="submit" class="agregar" name="button">Agregar al Carrito</button>
      </form>
    @endguest
  </div>
  {{-- @php
    dd($relacionados->all())
  @endphp --}}
  @empty (!$relacionados->all())
    <div class="relacionados">
      <h2>Productos Relacionados</h2>
      @foreach ($relacionados as $relacionado)
        <div class="relacionado">
          <div class="marca-relacionado">
            <img src="{{$relacionado->marca->imagen}}" alt="">
          </div>
          <a href="/productos/{{$relacionado->id}}">
            <div class="img-relacionado">
              <img src="/storage/{{$relacionado->imagenes()->first()->ruta}}" alt="">
            </div>
            <div class="texto-relacionado">
              <p>{{$relacionado->nombre}}</p>
            </div>
          </a>
        </div>
      @endforeach
    </div>
  @endempty

  <script src="/js/producto.js"></script>
@endsection
