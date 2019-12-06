@extends('/layouts/ecommerce')
@section('title')
  {{$producto->nombre}}
@endsection

@section('css')

'/css/producto.css'

@endsection

@section('principal')

  <div class="imagenes">
    <button type="button" class="control-carrousel" id="anterior"><i class="fas fa-arrow-left"></i></button>
    @foreach ($producto->imagenes as $imagen)
      <img class= 'imgProducto' src="/storage/{{$imagen->ruta}}" alt="">
    @endforeach
    <button type="button" class="control-carrousel" id="siguiente"><i class="fas fa-arrow-right"></i></button>
  </div>
  <div class="marca">
    <span>{{$producto->marca->nombre}}</span>
    <div class="marca-img">
      <img src="{{$producto->marca->imagen}}" alt="{{$producto->marca->nombre}}">
    </div>
  </div>
  <h1>{{$producto->nombre}}</h1>
  <h3>$ {{$producto->precio}}</h3>

  <script src="/js/producto.js"></script>
@endsection
