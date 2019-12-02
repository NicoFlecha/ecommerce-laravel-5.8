@extends('layouts/ecommerce')

@section('title')
Marcas
@endsection

@section('css')
'/css/categoria.css'
@endsection

@section('principal')
  <h1>Marcas</h1>
  <div class="categorias">
    @forelse ($marcas as $marca)
      <a class="categoria" href="/categorias/{{$marca->id}}">
        <div class="categoria-icon">
          <i class="{{$marca['icon']}}"></i>
        </div>
        <div class="texto">
          {{$marca['nombre']}}
        </div>
      </a>
    @empty
      <h3>No hay Marcas</h3>
    @endforelse
  </div>
  <div class="botones-edicion">
    @if (Auth::user())
      @if (Auth::user()->admin > 0)
        <div class="editar">
          <a class="editar" href="/marcas/agregar">Agregar Marcas</a>
        </div>
      @empty (!$categorias)
        <div class="editar">
          <a class="editar" href="/marcas/editar">Editar Marcas</a>
        </div>
      @endempty
      @endif
    @endif
  </div>
@endsection
