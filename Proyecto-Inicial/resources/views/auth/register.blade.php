@extends('layouts.ingreso')

@section('title', 'Registrarse')

@section('style')
    <link href="{{ url('css/registro.css') }}" rel="stylesheet">
    <link href="{{ url('css/notificationflash.css') }}" rel="stylesheet">
@stop

@section( 'script' )
	<script src="{{ url('js/ocultarelemento.js') }}"></script>
    <script src="{{ url('js/registro.js') }}"></script>
@stop

@section('content')
<div class="contenedor">
    @if(Session::has('message_danger'))
        <div class = "alert alert-danger flashmensasse" id = "message_alert">
            <em> {!! session('message_danger') !!}</em>
            <button id = "hide" type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        </div>
    @endif

  <div class="div-1">
		<p class="text-center">Registrarme</p>
	</div><!--div-1-->

    <div class="div-2" id="saludo">
        <div class="div-2-1">
            <div class="bienvenida">
                Hola! Estás a punto de iniciar tu registro en el Sistema de Seguimiento de Egresados de la UTM, de antemano te agradecemos por colaborar cordialmente con tu universidad.
            </div>
        </div>

        <div class="div-2-2">
            <form class="form-horizontal" role="form" method="POST" action="{{ route('crearUsuario.submit') }}">
            {{ csrf_field() }}
            <div class="label">Matricula:*</div>
                <div class="div-input {{ $errors->has('matricula') ? ' has-error' : '' }}">
                    <input type="text" name="egresado_matricula" id="entradas" placeholder="i.e. 2010123456" value="{{ old('matricula') }}" required autofocus>

                    @if ($errors->has('matricula'))
                        <span class="help-block">
                            <strong>{{ $errors->first('matricula') }}</strong>
                            error
                        </span>
                    @endif
                </div>
                <div class="label">Correo electrónico:*</div>
                <div class="div-input{{ $errors->has('correo') ? ' has-error' : '' }}">
                    <input type="email" value="{{ old( 'correo' ) }}" name="correo" id="entradas" placeholder="correo@ejemplo.net" required>

                    @if ($errors->has('correo'))
                        <span class="help-block">
                            <strong>{{ $errors->first('correo') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="label">Contraseña:*</div>
                <div class="div-input{{ $errors->has('password') ? ' has-error' : '' }}">
                  <input type="password" name="password" id="entradas" placeholder = "Contraseña" required>
                </div>

                <div class="label">Confirmar contraseña:*</div>
                <input type="password" name="password_confirmation" id="entradas" placeholder = "Confirme contraseña" required>
                
                <div class="last-label">* Campos obligatorios</div>

                <div class="btn-group">
                    <a href="{{url('/')}}" class="button1"> Cancelar</a>
                    <button type="submit" class="button2">Registrarse </button>
              </div>
        </form>
    </div>
  </div>

  <div class="div-3">
      <p>Si no recuerdas tu matrícula comunícate a las Coordinación de Vinculación de Alumnos y Egresados UTM a los teléfonos:</p>
  </div>
  <div class="div-4">
    <p>(953) 53 203 99 o (953) 53 20214 ext. 113 o 116.</p>
    <p>De lunes a Viernes de 8:00 a 13:00 y de 16:00 a 19:00 hrs.</p>
  </div>


    <div id="privacidad" class="modaloverlay">
        <div class="modal">
            <a href="{{url('/')}}" class="close">&times;</a>
                <div class="contenedor-2">
                  <div id="avisoTitulo" class="emergente-aviso-privacidad">Aviso de privacidad</div>
                  <div id="textoCompleto" class="emergente-texto-central">
                  La Universidad Tecnológica de la Mixteca, con domicilio en carretera a acatlima Km. 2.5, Huajuapan de León, Oaxaca.
                   utilizará tus datos personales recabados de este sistema para realizar un seguimiento preciso de las actividades
                   profesionales de nuestro egresados que servirá como instrumento de análisis estadístico del desempeño académico
                   de tu universidad. Tu información se tratará con absoluta confidencialidad, y solo será para uso del sistema,
                  ni empleadores, ni personas ajenas al sistema podrán visualizarla. Para mayor información acerca del tratamiento
                  y de los derechos que puedes hacer valer, puedes acceder al aviso de privacidad completo a través de nuestra
                  oficina de seguimiento a egresados, ubicada en la misma dirección.

                </div>

                <div id="a" class="column">
                    <a id="leerAviso" onclick="mostrarAviso()" class="aviso-privacidad">Leer aviso de privacidad completo.</a>
                </div>

                <div class="div-btn">
                  <div class="btn1">
                    <a href="{{url('/')}}"><button class="emergente-button1">Cancelar</button></a>
                 </div>
                  <div class="btn-2">
                    <button class="emergente-button2" onclick="closeModal()">Aceptar</button>
                  </div>
                </div>
              </div>
        </div>
    </div>
  </div>
@stop
