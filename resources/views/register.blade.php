@extends('layouts/ecommerce')

@section('title')
  ¡Registrate!
@endsection

@section('css')
  '/css/register.css'
@endsection

@section('principal')
  {{-- <script src="/js/validacionRegistro.js"></script> --}}
  <h1>¡Registrate!</h1>
  <div class="contenedorFormulario">
    <form class="registro" action="/register" method="post" enctype="multipart/form-data">
      @csrf
      <div class="inputForm">
        <label for="nombre">Nombre:</label>
        <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" id="nombre" placeholder="Roberto" value="{{ old('name') }}">
        <div class="invalid-feedback">
          @error('name')
              {{$message}}
          @enderror
        </div>
      </div>
      <div class="inputForm">
        <label for="apellido">Apellido:</label>
        <input class="form-control @error('name') is-invalid @enderror" type="text" name="apellido" id="apellido" placeholder="Sarasa" value="{{ old('apellido') }}">
        <div class="invalid-feedback">
          @error('name')
              {{$message}}
          @enderror
        </div>
      </div>
      <div class="inputForm email">
        <label for="email">Email:</label>
        <input class="form-control @error('email') is-invalid @enderror" type="email" name="email" id="email" placeholder="sarasa@sarasa.com" value="{{ old('email') }}">
        <div class="invalid-feedback">
          @error('email')
              {{$message}}
          @enderror
        </div>
      </div>
      <div class="inputForm">
        <label for="password">Contraseña:</label>
        <input class="form-control @error('password') is-invalid @enderror" type="password" name="password" id="password">
        <div class="invalid-feedback">
          @error('password')
              {{$message}}
          @enderror
        </div>
      </div>
      <div class="inputForm">
        <label for="rePassword">Confirmar Contraseña:</label>
        <input class="form-control @error('password') is-invalid @enderror" type="password" name="password_confirmation" id="rePassword">
        <div class="invalid-feedback">
          @error('password')
              {{$message}}
          @enderror
        </div>
      </div>
      <div class="paraEnviar">
        <label for="avatar" class="archivoBtn form-control @error('avatar') is-invalid @enderror">Elegí una foto de Perfil</label>
        <input class="archivo" type="file" name="avatar" id='avatar' value="Hola">
        <input class="enviar" type="submit" value='Registrarme'>
      </div>
      <div class="avatar-error">
        @error('avatar')
            {{$message}}
        @enderror
      </div>
    </form>
  </div>
@endsection
