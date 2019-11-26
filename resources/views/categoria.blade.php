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
      <h3>No hay Categorias</h3>
    @endforelse
  </div>
  <div class="botones-edicion">
    @if (Auth::user())
      @if (Auth::user()->admin > 0)
        <div class="editar">
          <a class="editar" href="/categorias/agregar">Agregar Categorías</a>
        </div>
      @empty (!$categorias)
        <div class="editar">
          <a class="editar" href="/categorias/editar">Editar Categorías</a>
        </div>
      @endempty
      @endif
    @endif
  </div>
@endsection
