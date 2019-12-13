@extends('layouts/authLayout')

@section('title')
  Perfil de {{Auth::user()->name}}
@endsection

@section('css')
  '/css/login.css'
@endsection

@section('principal')
 hola
@endsection
