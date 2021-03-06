@extends('layouts/ecommerce')

@section('title')
Categorias
@endsection

@section('css')
'/css/categoriaEditar.css'
@endsection

@section('principal')
  <h1>Edite la Categoría</h1>
  <form class="editar" action="/categorias/editar" method="post">
    @csrf
    <input type="text" name="id" value="{{$categoria['id']}}" class="no-mostrar">
    <label for="">Nombre de la Categoría:</label>
    <input type="text" name="nombre" value="{{$categoria['nombre']}}">
    <label for="">Icono:</label>
    <input type="text" name="icon" value="{{$categoria['icon']}}">
    <div class="botones-edicion">
      <div class="editar">
        <input class='editar' type="submit" value='Guardar'>
      </div>
      <div class="editar">
        <a class="editar" href="/categorias">Volver</a>
      </div>
    </div>
  </form>
  <form class="eliminar" action="/categorias/eliminar" method="post">
    @csrf
    <input type="text" name="id" value="{{$categoria['id']}}" class="no-mostrar">
    <input type="submit" value="Eliminar">
  </form>
@endsection
