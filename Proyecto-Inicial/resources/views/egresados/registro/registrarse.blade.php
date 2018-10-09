@extends('layouts.ingreso')

@section('title', 'Registrarse')

@section('style')
    <link href="{{ url('css/registro.css') }}" rel="stylesheet">
@stop

@section('content')
<div class="contenedor">
  <div class="div-1">
		<p class="text-center">Registrarme</p>
	</div><!--div-1-->

    <div class="div-2" id="saludo">
      <div class="div-2-1">
        <div class="bienvenida">
                Hola! Estás a punto de iniciar tu registro en el Sistema de Seguimiento de Egresados de la UTM,
                de antemano te agradecemos por colaborar cordialmente con tu universidad.
        </div>
        <div class="column">
            <a href="#privacidad" class="aviso-privacidad">Leer aviso de privacidad.</a>
        </div>
    </div>

    <div class="div-2-2">
        <form class="form-horizontal" role="form" method="POST" action="{{ route('register') }}">
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

                <div class="label">CURP:*</div>
                <div class="div-input{{ $errors->has('curp') ? ' has-error' : '' }}">
                    <input type="text" name="curp" id="entradas" value="{{ old('curp') }}" style="text-transform:uppercase" required>
                </div>

                <div class="label">Correo electrónico:*</div>
                <div class="div-input{{ $errors->has('correo') ? ' has-error' : '' }}">
                    <input type="text" name="correo" id="entradas" placeholder="correo@ejemplo.net" required>

                    @if ($errors->has('correo'))
                        <span class="help-block">
                            <strong>{{ $errors->first('correo') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="label">Contraseña:*</div>
                <div class="div-input{{ $errors->has('password') ? ' has-error' : '' }}">
                  <input type="password" name="password" id="entradas" required>
                </div>

                <div class="label">Confirmar contraseña:*</div>
                <input type="password" name="password_confirmation" id="entradas" required>
                <div class="last-label">* Campos obligatorios</div>

                <div class="btn-group">
                    <a href="{{url('/')}}" class="button1"> Cancelar</a>
                    <button type="submit">
                        <a href="{{url('bienvenida')}}" class="button2" type="submit">Registrarse</a>
                    </button>
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
            <a href="#close" class="close">&times;</a>
                <div class="contenedor-2">
                  <div class="emergente-aviso-privacidad">Aviso de privacidad</div>
                  <div class="emergente-texto-central">
                  La Universidad Tecnológica de la Mixteca, con domicilio en carretera a acatlima Km. 2.5, Huajuapan de León, Oaxaca.
                   utilizará tus datos personales recabados de este sistema para realizar un seguimiento preciso de las actividades
                   profesionales de nuestro egresados que servirá como instrumento de análisis estadístico del desempeño académico
                   de tu universidad. Tu información se tratará con absoluta confidencialidad, y solo será para uso del sistema,
                  ni empleadores, ni personas ajenas al sistema podrán visualizarla. Para mayor información acerca del tratamiento
                  y de los derechos que puedes hacer valer, puedes acceder al aviso de privacidad completo a través de nuestra
                  oficina de seguimiento a egresados, ubicada en la misma dirección.
                </div>
                <div class="div-btn">
                  <div class="btn1">
                  <a href="{{url('/')}}"><button class="emergente-button1">Cancelar</button></a>
                </div>
                <div class="btn-2">
                  <a href="#"><button class="emergente-button2">Aceptar</button></a>
                </div>
                </div>
              </div>
        </div>
    </div>
  </div><!--contenedor-->
@stop
