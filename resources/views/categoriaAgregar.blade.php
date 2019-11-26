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
    <label for="">Nombre de la Categoría:</label>
    <input type="text" name="nombre">
    <label for="">Icono:</label>
    <input type="text" name="icon">
    <div class="botones-edicion">
      <div class="editar">
        <input class='editar' type="submit" value='Guardar'>
      </div>
      <div class="editar">
        <a class="editar" href="/categorias">Volver</a>
      </div>
    </div>
  </form>
@endsection
