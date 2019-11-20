@extends('layouts/ecommerce')

@section('title')
Categorias
@endsection

@section('css')
'/css/categoriaEditar.css'
@endsection

@section('principal')
  <h1>Edite la Categoría</h1>
  <form class="editar" action="index.html" method="post">
    <label for="">Nombre de la Categoría:</label>
    <input type="text" name="nombre" value="{{$categoria['nombre']}}">
    <label for="">Icono:</label>
    <input type="text" name="icon" value="{{$categoria['icon']}}">
    <div class="editar">
      <a class="editar" href="/categorias/editar">Guardar</a>
    </div>
  </form>
@endsection
