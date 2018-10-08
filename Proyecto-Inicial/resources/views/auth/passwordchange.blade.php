@extends('layouts.master')

@section('title', 'Página de registro')

@section('style')
    <link href="{{ url('css/registro.css') }}" rel="stylesheet">
    <link href="{{ url('css/notificationflash.css') }}" rel="stylesheet">
@stop

@section('script')
	<script src="{{ url('js/ocultarelemento.js') }}"></script>
@stop

@section('content')
    <div class="contenedor">
        @if(Session::has('message_danger'))
            <div class = "alert alert-danger flashmensasse" id = "message_alert">
            <em> {!! session('message_danger') !!}</em>
            <button id = "hide" type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            </div>
        @endif
        <!-- Muestra un mensaje de alerta en caso de que el usuario no se puede registrar -->        
        <div class="div-1">
            <p class="text-center">Cambiar contraseña</p>
        </div><!--div-1-->

        <div class="div-2-2">
            <form class="form-horizontal" role="form" method="POST" action="{{ route( 'confirmar.submit' ) }}">
                {{ csrf_field() }}
            <div class="contenedor-datos">
                <div class = "form-group{{ $errors->has( 'passwordold' ) ? ' has-error' : '' }}">
                    <label for = "password" class = "col-md-4 control-label">Contraseña actual: </label>
                    
                    <div class = "col-md-6" >
                        <input id = "password" type = "password" class = "form-control" name = "passwordold" required autofocus>
                        @if( $errors->has( 'passwordold' ) )
                            <span class = "help-block">
                                <strong>{{ $errors->first( 'passwordold' ) }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class = "form-group{{ $errors->has( 'password' ) ? ' has-error' : '' }}">
                    <label for = "password" class = "col-md-4 control-label">Contraseña nueva: </label>
                    <div class = "col-md-6" >
                        <input id = "password" type = "password" class = "form-control" name = "password" required>
                        @if( $errors->has( 'passwordold' ) )
                            <span class = "help-block">
                                <strong>{{ $errors->first( 'passwordold' ) }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class = "form-group">
                    <label for = "password-confirm" class = "col-md-4 control-label">Confirmar contraseña nueva: </label>
                    <div class = "col-md-6" >
                        <input id = "password-confirm" type = "password" class = "form-control" name = "password_confirmation" required>
                    </div>
                </div>
            </div>
                    <div class = "col-md-offset-4">
                        <a href="{{url('/home')}}" class="button1">Cancelar</a>
                        <button type="submit" class = "btn btn-primary">Confirmar</button>
                    <div>                        
            </form>
        </div>
    </div>

    </div>
</div><!--contenedor-->
@stop
