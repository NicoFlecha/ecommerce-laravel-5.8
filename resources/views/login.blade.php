@extends('layouts/ecommerce')

@section('title')
  ¡Inicia Sesión!
@endsection

@section('css')
  '/css/login.css'
@endsection

@section('principal')
  </div>
  <h1>Iniciar Sesión</h1>
  <div class="contenedorFormulario">
    <form class="login" action="/login" method="post">
      @csrf
      <label for="user">Email ó Usuario:</label>
      <input type="text" name="email" id="user" placeholder="sarasa" value="">
      @error('email')
        {{$message}}
      @enderror
      <label for="password">Contraseña:</label>
      <input type="password" name="password" id="password">
      @error('password')
        {{$message}}
      @enderror
      <div class="paraIngresar">
        <input class="ingresar" type="submit" value="Ingresar">
      </div>
    </form>
  </div>
@endsection
