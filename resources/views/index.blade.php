@extends('/layouts/ecommerce')
@section('title')
  Home
@endsection

@section('css')

'/css/home.css'

@endsection

@section('principal')

    <div class="banner">
      <!-- <img src="img/banner.jpg" alt="Laptop"> -->
    </div>
    <div class="productos">
      @forelse ($productos as $producto)
      <a class="linkProducto" href="/productos/{{$producto->id}}">
        <div class="producto">
          <div class="imgProducto">
            <img src={{$producto['imgProducto']}}>
          </div>
          <div class="textoProducto">
            <div class="nombre">
              {{$producto->nombre}}
            </div>
            <div class="categoria">
              {{$producto->categoria->nombre}}
            </div>
            <div class="marca">
              <img src="{{$producto->marca->imagen}}" alt="{{$producto->marca->nombre}}">
            </div>
            <div class="precio">
              <span>$ {{$producto['precio']}}</span>
            </div>
            <div class="descripcion">
              <small>{{$producto['descripcion']}}</small>
            </div>
          </div>
        </div>
      </a>
    @empty
      <p>No hay Productos</p>
    @endforelse
    </div>
    {{$productos->links()}}

@endsection
