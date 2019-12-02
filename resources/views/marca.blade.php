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
      <a class="categoria" href="/marcas/{{$marca->id}}">
        <div class="categoria-icon">
          <img src="{{$marca['imagen']}}">
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
      @empty (!$marcas)
        <div class="editar">
          <a class="editar" href="/marcas/editar">Editar Marcas</a>
        </div>
      @endempty
      @endif
    @endif
  </div>
@endsection
