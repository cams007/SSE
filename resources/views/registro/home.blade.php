@extends('layouts.master')

@section('title', 'Inicio')

@section('style')
<link href="{{ url('css/home.css') }}" rel="stylesheet">


@section('content')
<h4 class="text-center">Página de inicio</h4>

<h2> Bienveidos a la página del Sistema de del Seguimiento de Egresados de la Universidad Tecnológica de la Mixteca</h2>
<h3>Por favor, elija una opción en el menú.</h3>
<body>
  <div id="divlogo">
    <img id = "SSE" width="200" height="200" src="{{url('assets/images/logo_see_contenido.png')}}">
  </div>

</body>
@stop
