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
    <label for="nombre">Nombre del Producto:</label>
    <input type="text" name="nombre" id="nombre" value="">
    <label for="categoria"></label>
    <select class="" name="categoria_id" id="categoria">
      <option value="">Elija una opción</option>
      @foreach ($categorias as $categoria)
        <option value="{{$categoria->id}}">{{$categoria->nombre}}</option>
      @endforeach
    </select>
  </form>
@endsection
