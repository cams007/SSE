@extends('admin.layouts.master')

@section('title', 'Home')

@section('style')
    <link href="{{ url('css/home.css') }}" rel="stylesheet">
    <link href="{{ url('css/notificationflash.css') }}" rel="stylesheet">
@stop

@section('script')
	<script src="{{ url('js/ocultarelemento.js') }}"></script>
@stop

@section('content')
    
    @if(Session::has('message_success'))
        <div class = "alert alert-success flashmensasse" id = "message_alert">
            <em> {!! session('message_success') !!}</em>
            <button id = "hide" type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        </div>
    @endif

    <h4 class="text-center">Página de inicio</h4>

    <h2>Bienveido a la página administrador del Sistema de del Seguimiento de Egresados de la Universidad Tecnológica de la Mixteca</h2>
    <h3>Por favor, elija una opción en el menú.</h3>
    
    <body>
        <div id="divlogo">
        <img id = "SSE" width="200" height="200" src="{{url('assets/images/logo_see_contenido.png')}}">
        </div>
    </body>
@stop
