@extends('/layouts/ecommerce')
@section('title')
  Home
@endsection

@section('css')

'/css/home.css'

@endsection

@section('principal')

  <div class="productos">
@forelse ($busquedas as $busqueda)
  <div class="producto">
    <button type="button" class="anterior controlador-anterior"><i class="fas fa-arrow-left"></i></button>
    <a class="linkProducto" href="/productos/{{$busqueda->id}}">
    <div class="imgProducto">
      @foreach ($busqueda->imagenes as $imagen)
        <img class="imagen-producto" src="/storage/{{$imagen->ruta}}" alt="">
      @endforeach
    </div>
    <div class="textoProducto">
      <div class="nombre">
        {{$busqueda->nombre}}
      </div>
      <div class="categoria">
        {{$busqueda->categoria->nombre}}
      </div>
      <div class="marca">
        <img src="{{$busqueda->marca->imagen}}" alt="{{$busqueda->marca->nombre}}">
      </div>
      <div class="precio">
        <span>$ {{$busqueda['precio']}}</span>
      </div>
      <div class="descripcion">
        <small>{{$busqueda['descripcion']}}</small>
      </div>
    </div>
    </a>
<button type="button" class="siguiente controlador-siguiente"><i class="fas fa-arrow-right"></i></button>
</div>
@empty
  <p>No hay Productos</p>
@endforelse
</div>

@endsection
