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
    @if (Auth::user())
      @if (Auth::user()->admin > 0)
        <div class="editar">
          <a class="editar" href="/productos/agregar">Agregar Producto</a>
        </div>
      @endif
    @endif
    <div class="productos">
      @forelse ($productos as $producto)
          <div class="producto">
            <button type="button" class="anterior controlador-anterior"><i class="fas fa-arrow-left"></i></button>
            <a class="linkProducto" href="/productos/{{$producto->id}}">
            <div class="imgProducto">
              @foreach ($producto->imagenes as $imagen)
                <img class="imagen-producto" src="/storage/{{$imagen->ruta}}" alt="">
              @endforeach
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
            </a>
        <button type="button" class="siguiente controlador-siguiente"><i class="fas fa-arrow-right"></i></button>
      </div>
    @empty
      <p>No hay Productos</p>
    @endforelse
    </div>
    <script src="/js/index.js"></script>
    {{$productos->links()}}
@endsection
