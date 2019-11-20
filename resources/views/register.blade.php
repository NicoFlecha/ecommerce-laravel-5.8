@extends('layouts/ecommerce')

@section('title')
  ¡Registrate!
@endsection

@section('css')
  '/css/register.css'
@endsection

@section('principal')
  <h1>¡Registrate!</h1>
  <div class="contenedorFormulario">
    <form class="registro" action="/register" method="post">
      @csrf
      <div class="inputForm">
        <label for="nombre">Nombre:</label>
        <input type="text" name="name" id="nombre" placeholder="Roberto" value="">
        @error('name')
          {{$message}}
        @enderror
      </div>
      <div class="inputForm">
        <label for="apellido">Apellido:</label>
        <input type="text" name="apellido" id="apellido" placeholder="Sarasa" value="">
        @error('name')
          {{$message}}
        @enderror
      </div>
      <div class="inputForm email">
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" placeholder="sarasa@sarasa.com" value="">
        @error('email')
          {{$message}}
        @enderror
      </div>
      <div class="inputForm">
        <label for="password">Contraseña:</label>
        <input type="password" name="password" id="password">
        @error('password')
          {{$message}}
        @enderror
      </div>
      <div class="inputForm">
        <label for="rePassword">Confirmar Contraseña:</label>
        <input type="password" name="password_confirmation" id="rePassword">
        @error('password')
          {{$message}}
        @enderror
      </div>
      <div class="paraEnviar">
        <input class="enviar" type="submit" value='Registrarme'>
      </div>
    </form>
  </div>
@endsection
