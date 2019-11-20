@extends('layouts/ecommerce')

@section('title')
Categorias
@endsection

@section('css')
'/css/categoria.css'
@endsection

@section('principal')
  <h1>Categorias</h1>
  <div class="categorias">
    @forelse ($categorias as $categoria)
      <a class="categoria" href="#">
        <div class="categoria-icon">
          <i class="{{$categoria['icon']}}"></i>
        </div>
        <div class="texto">
          {{$categoria['nombre']}}
        </div>
      </a>
    @empty
      <p>No hay marcas</p>
    @endforelse
    <div class="editar">
      <a class="editar" href="/categorias/editar">Editar Categorías</a>
    </div>
  </div>
@endsection
