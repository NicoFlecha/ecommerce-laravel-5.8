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
        <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" id="nombre" placeholder="Roberto" value="{{ old('name') }}">
        @error('name')
          <div class="invalid-feedback">
            {{$message}}
          </div>
        @enderror
      </div>
      <div class="inputForm">
        <label for="apellido">Apellido:</label>
        <input class="form-control @error('name') is-invalid @enderror" type="text" name="apellido" id="apellido" placeholder="Sarasa" value="{{ old('apellido') }}">
        @error('name')
          <div class="invalid-feedback">
            {{$message}}
          </div>
        @enderror
      </div>
      <div class="inputForm email">
        <label for="email">Email:</label>
        <input class="form-control @error('email') is-invalid @enderror" type="email" name="email" id="email" placeholder="sarasa@sarasa.com" value="{{ old('email') }}">
        @error('email')
          <div class="invalid-feedback">
            {{$message}}
          </div>
        @enderror
      </div>
      <div class="inputForm">
        <label for="password">Contraseña:</label>
        <input class="form-control @error('password') is-invalid @enderror" type="password" name="password" id="password">
        @error('password')
          <div class="invalid-feedback">
            {{$message}}
          </div>
        @enderror
      </div>
      <div class="inputForm">
        <label for="rePassword">Confirmar Contraseña:</label>
        <input class="form-control @error('password') is-invalid @enderror" type="password" name="password_confirmation" id="rePassword">
        @error('password')
          <div class="invalid-feedback">
            {{$message}}
          </div>
        @enderror
      </div>
      <div class="paraEnviar">
        <input class="enviar" type="submit" value='Registrarme'>
      </div>
    </form>
  </div>
@endsection
