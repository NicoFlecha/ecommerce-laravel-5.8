@extends('layouts/ecommerce')

@section('title')
Categorias
@endsection

@section('css')
'/css/categoria.css'
@endsection

@section('principal')
  <h1>Categorias</h1>
  <h2>Haga clic en alguna categoria para empezar a editarla</h2>
  <div class="categorias">
    @forelse ($categorias as $categoria)
      <a class="categoria" href="/categorias/editar/{{$categoria['id']}}">
        <div class="categoria-icon">
          <i class="{{$categoria['icon']}}"></i>
        </div>
        <div class="texto">
          {{$categoria['nombre']}}
        </div>
      </a>
    @empty
      <p>No hay Categorias</p>
    @endforelse
    <div class="editar">
      <a class="editar" href="/categorias">Volver</a>
    </div>
  </div>
@endsection
