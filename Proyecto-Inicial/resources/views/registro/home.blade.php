@extends('layouts.master')

@section('title', 'Inicio')

@section('style')
<link href="{{ url('css/registro.css') }}" rel="stylesheet">
@stop

@section('content')
        <div>
        	<p class="seccion">Página de inicio</p><br><hr>
          	<div id="text-center">
             	<p id="bienvenida">Bienvenidos a la página del Sistema de Seguimiento de Egresados de la Universidad Tecnológica de la Mixteca.</p> <br>
                <p id="bienvenida">Por favor, elija una opción en el menú.</p>
                <br><br>
                <div>
                <img src="{{url('assets/images/logo_see_contenido.png')}}" alt="user-picture" class="img-thumbnail img">
             	</div>
          	</div>

        </div>
@stop
