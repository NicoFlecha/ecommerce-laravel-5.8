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

  @endphp
  <img src= @if(Auth::user()->avatar) '/storage/{{Auth::user()->avatar}}' @else '/img/default.png' @endif" alt="Foto de {{Auth::user()->name}}">
  <div class="">
    <h1>{{$nombre}} {{$apellido}}</h1>
    <h2>Username:{{$userName}}</h2>
    <p>{{$email}}</p>
  </div>
</div>
<div class="editar">
  <a class="editar" href="/perfil/editar">Editar perfil</a>
</div>
@endsection
