@extends('layouts/ecommerce')

@section('title')
Categorias
@endsection

@section('css')
'/css/categoriaEditar.css'
@endsection

@section('principal')
  <h1>Edite la Marca</h1>
  <form class="editar" action="/marcas/editar" method="post">
    @csrf
    <input type="text" name="id" value="{{$marca['id']}}" class="no-mostrar">
    <label for="">Nombre de la Marca:</label>
    <input type="text" name="nombre" value="{{$marca['nombre']}}">
    <label for="">Icono:</label>
    <input type="text" name="icon" value="{{$marca['icon']}}">
    <div class="botones-edicion">
      <div class="editar">
        <input class='editar' type="submit" value='Guardar'>
      </div>
      <div class="editar">
        <a class="editar" href="/marcas">Volver</a>
      </div>
    </div>
  </form>
  <form class="eliminar" action="/marcas/eliminar" method="post">
    @csrf
    <input type="text" name="id" value="{{$marca['id']}}" class="no-mostrar">
    <input type="submit" value="Eliminar">
  </form>
@endsection
