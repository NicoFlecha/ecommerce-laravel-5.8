@extends('/layouts/ecommerce')
@section('title')
  {{$producto->nombre}}
@endsection

@section('css')

'/css/home.css'

@endsection

@section('principal')

    <h1>{{$producto->nombre}}</h1>
    <h3>{{$producto->precio}}</h3>

@endsection
