@extends('layouts/ecommerce')

@section('title')
Categorias
@endsection

@section('css')
'/css/categoria.css'
@endsection

@section('principal')
  <h1>Marcas</h1>
  <h2>Haga clic en alguna marca para empezar a editarla</h2>
  <div class="categorias">
    @forelse ($marcas as $marca)
      <a class="categoria" href="/marcas/editar/{{$marca['id']}}">
        <div class="categoria-icon">
          <i class="{{$marca['icon']}}"></i>
        </div>
        <div class="texto">
          {{$marca['nombre']}}
        </div>
      </a>
    @empty
      <p>No hay Marcas</p>
    @endforelse
    <div class="editar">
      <a class="editar" href="/marcas">Volver</a>
    </div>
  </div>
@endsection
