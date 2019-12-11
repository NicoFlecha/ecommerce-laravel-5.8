@extends('/layouts/ecommerce')
@section('title')
  {{$producto->nombre}}
@endsection

@section('css')

'/css/producto.css'

@endsection

@section('principal')
  <div class="producto">
    <div class="imagenes">
      <button type="button" class="control-carrousel" id="anterior"><i class="fas fa-arrow-left"></i></button>
      @foreach ($producto->imagenes as $imagen)
        <img class= 'imgProducto' src="/storage/{{$imagen->ruta}}" alt="">
      @endforeach
      <button type="button" class="control-carrousel" id="siguiente"><i class="fas fa-arrow-right"></i></button>
    </div>
    <div class="marca">
      <div class="marca-img">
        <img src="{{$producto->marca->imagen}}" alt="{{$producto->marca->nombre}}">
      </div>
    </div>
    <h1>{{$producto->nombre}}</h1>
    <h3>$ {{$producto->precio}}</h3>
    <p>{{$producto->descripcion}}</p>
    <form class="" action="/agregarCarrito" method="post">
      @csrf
      <input type="text" name="producto_id" value="{{$producto->id}}">
      <input type="number" name="cantidad" value="2">
      <input type="submit">
    </form>
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
