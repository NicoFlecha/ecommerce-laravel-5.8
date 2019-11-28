@extends('layouts/ecommerce')

@section('title')
  Agregar Producto
@endsection

@section('css')
  ''
@endsection

@section('principal')
  <form action="/productos/agregar" method="post">
    @csrf
    <label for="nombre">Nombre del Producto:</label><br>
    <input type="text" name="nombre" id="nombre" value=""><br>
    <label for="categoria">¿A qué categoría corresponde?:</label><br>
    <select class="" name="categoria_id" id="categoria">
      <option value="" selected>Elija una opción</option>
      @foreach ($categorias as $categoria)
        <option value="{{$categoria->id}}">
          {{$categoria->nombre}}
        </option>
      @endforeach
    </select><br>
    <label for="precio">Precio (en pesos):</label><br>
    <input type="text" name="precio"><br>
    <label for="descripcion">Describí el Producto:</label><br>
    <textarea name="descripcion" rows="8" cols="80"></textarea><br>
    <label for="cantidad">Stock del Producto:</label><br>
    <input type="number" name="cantidad" value="1"><br>
    <input type="submit" value="Guardar">
  </form>
@endsection
