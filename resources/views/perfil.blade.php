@extends('layouts/ecommerce')

@section('title')
  Perfil de {{Auth::user()->name}}
@endsection

@section('css')
  '/css/login.css'
@endsection
@php
  $userName = Auth::user()->username;
  $nombre = Auth::user()->name;
  $apellido = Auth::user()->apellido;
  $email = Auth::user()->email;
@endphp
@section('principal')
<div class="datos">
  @php
    $avatar = 'default.png';
    if (Auth::user()->avatar) {
      $avatar = Auth::user()->avatar;
    }
  @endphp
  <img src="/storage/{{$avatar}}">
  <div class="">
    <h1>{{$nombre}}-{{$apellido}}</h1>
    <p>{{$email}}</p>
  </div>
</div>
<div class="editar">
  <a class="editar" href="/perfil/editar">Editar perfil</a>
</div>
@endsection
