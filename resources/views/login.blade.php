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
      <input class="form-control @error('email') is-invalid @enderror" type="text" name="email" id="user" placeholder="sarasa" value="{{ old('email') }}">
        @error('email')
          <div class="invalid-feedback">
            {{$message}}
          </div>
        @enderror
      <label for="password">Contraseña:</label>
      <input class="form-control @error('password') is-invalid @enderror" type="password" name="password" id="password">
      @error('password')
        <div class="invalid-feedback">
          {{$message}}
        </div>
      @enderror
      <div class="paraIngresar">
        <a href="/register" class="no-cuenta">¿No tenés cuenta?</a>
        <input class="ingresar" type="submit" value="Ingresar">
      </div>
      <div class="ingreso-redes">
        <div class="red-container">
          <a href="/login/google" class="red"><img src="https://www.stickpng.com/assets/images/5a951939c4ffc33e8c148af2.png">Ingresar con Google</a>
        </div>
      </div>
    </form>
  </div>
@endsection
