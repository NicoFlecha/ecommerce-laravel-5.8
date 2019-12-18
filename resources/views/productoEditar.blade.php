@extends('layouts/ecommerce')

@section('css')
  '/css/register.css'
@endsection

@section('principal')

<h1>Edita tu perfil</h1>
<div class="contenedorFormulario">
<form class="registro" action="/producto/editar/{{$producto->id}}" method="post" enctype="multipart/form-data">
  @csrf
  <label for="nombre">Nombre del Producto:</label><br>
  <input type="text" name="nombre" id="nombre" value="{{$producto->nombre}}"><br>
  @error ('nombre')
    {{$message}}<br>
  @enderror

  <label for="precio">Precio (en pesos):</label><br>
  <input type="text" name="precio" value="{{$producto->precio}}"><br>
  @error ('precio')
    {{$message}}<br>
  @enderror
  <label for="descripcion">Describí el Producto:</label><br>
  <textarea name="descripcion" rows="8" cols="80" >{{$producto->descripcion}}</textarea><br>
  @error ('descripcion')
    {{$message}}<br>
  @enderror
  <label for="cantidad">Stock del Producto:</label><br>
  <input type="number" name="cantidad" value="{{$producto->cantidad}}"><br>
  @error ('cantidad')
    {{$message}}<br>
  @enderror
  <div class="paraEnviar">
    <input class="enviar" type="submit" value='Actualizame'>
  </div>

</form>
</div>
@endsection
