@extends('layouts/ecommerce')

@section('title')
  Agregar Producto
@endsection

@section('css')
'/css/categoriaEditar.css'x
@endsection

@section('principal')
  <form class="editar" action="/productos/agregar" method="post" enctype="multipart/form-data">
    @csrf
    <label for="nombre">Nombre del Producto:</label><br>
    <input type="text" name="nombre" id="nombre" value="{{old('nombre')}}"><br>
    @error ('nombre')
      {{$message}}<br>
    @enderror
    <label for="categoria">¿A qué categoría corresponde?:</label><br>
    <select class="" name="categoria_id" id="categoria">
      <option value="" selected>Elija una opción</option>
      @foreach ($categorias as $categoria)
        <option value="{{$categoria->id}}">
          {{$categoria->nombre}}
        </option>
      @endforeach
    </select><br>
    @error ('categoria_id')
      {{$message}}<br>
    @enderror
    <label for="marca">¿A qué marca corresponde?:</label><br>
    <select class="" name="marca_id" id="marca">
      <option value="" selected>Elija una opción</option>
      @foreach ($marcas as $marca)
        <option value="{{$marca->id}}">
          {{$marca->nombre}}
        </option>
      @endforeach
    </select><br>
    @error ('categoria_id')
      {{$message}}<br>
    @enderror
    <label for="precio">Precio (en pesos):</label><br>
    <input type="text" name="precio" value="{{old('precio')}}"><br>
    @error ('precio')
      {{$message}}<br>
    @enderror
    <label for="descripcion">Describí el Producto:</label><br>
    <textarea name="descripcion" rows="8" cols="80"></textarea><br>
    @error ('descripcion')
      {{$message}}<br>
    @enderror
    <label for="cantidad">Stock del Producto:</label><br>
    <input type="number" name="cantidad" value="1"><br>
    @error ('cantidad')
      {{$message}}<br>
    @enderror
    <label for="imagen">Seleccione una imagen para el Producto:</label><br>
    <input type="file" name="imagen[]" id="imagen" multiple><br>
    @error ('imagen')
      {{$message}}<br>
    @enderror
    <input type="submit" value="Guardar" id="guardar">
  </form>
@endsection
