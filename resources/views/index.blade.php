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
          <div class="producto">
            <button type="button" class="anterior{{$producto->id}} controlador-anterior"><</button>
            <a class="linkProducto" href="/productos/{{$producto->id}}">
            <div class="imgProducto">
              @php
              $imagenesProducto = $producto->imagenes->all();
              @endphp
              <img class="imagen-producto{{$producto->id}}" src="/storage/{{$producto->imagenes->first()->ruta}}" alt="">
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
        <button type="button" class="siguiente{{$producto->id}} controlador-siguiente">></button>
      </div>
      <script>
        var imagenesJSON{{$producto->id}} = @json($imagenesProducto);
        var contador{{$producto->id}} = 0;
        var cantidadImagenes{{$producto->id}} = imagenesJSON{{$producto->id}}.length;
        var imagen{{$producto->id}} = document.querySelector('.imagen-producto{{$producto->id}}');
        var siguienteBtn = document.querySelector('.siguiente{{$producto->id}}');
        var anteriorBtn = document.querySelector('.anterior{{$producto->id}}');
        siguienteBtn.addEventListener('click', function () {
          contador{{$producto->id}}++;
          if (contador{{$producto->id}} > cantidadImagenes{{$producto->id}} - 1) {
            contador{{$producto->id}} = 0;
          }
          imagen{{$producto->id}}.setAttribute('src', '/storage/' + imagenesJSON{{$producto->id}}[contador{{$producto->id}}].ruta)
          console.log(imagenesJSON{{$producto->id}}[contador{{$producto->id}}].ruta);
        });
        anteriorBtn.addEventListener('click', function () {
          contador{{$producto->id}}--;
          if (contador{{$producto->id}} < 0) {
            contador{{$producto->id}} = cantidadImagenes{{$producto->id}} - 1;
          }
          imagen{{$producto->id}}.setAttribute('src', '/storage/' + imagenesJSON{{$producto->id}}[contador{{$producto->id}}].ruta)
          console.log(imagenesJSON{{$producto->id}}[contador{{$producto->id}}].ruta);
        });
      </script>
    @empty
      <p>No hay Productos</p>
    @endforelse
    </div>
    {{$productos->links()}}
@endsection
