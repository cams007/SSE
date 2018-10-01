<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <link href="{{url('css/inicio.css')}}" rel="stylesheet">
    </head>

    <body>

    <section id="franja">
        <div id="franja_contenedor">
            <div id="logo_sse"> </div>
            <div id="titulo_index"><p>Sistema de Seguimiento de Egresados</p></div>
            <div id="logo_info"></div>
        </div>
    </section>

    <div class="block">
    <img id="logo_utm" src="{{url('assets/images/logo_utm_login.png')}}">

    <form id="form_login" role="form" method="POST" action="{{ route('login') }}">
        {{ csrf_field() }}

        @if (Session::has('failure'))
            <div class="alert alert-danger">{!! Session::get('failure') !!}</div>
        @endif

        <div class="usuario-login">
            <div id="logo-user"></div>
            <input type="email" name="correo" id="correo" value = "{{ old('correo') }}" placeholder = "Correo electrónico" required autofocus>

            {{-- @if ($errors->has('correo'))
                <span class="help-block">
                    <strong>{{ $errors->first('correo') }}</strong>
                </span>
            @endif --}}
        </div>

        <div class="password-login">
            <div id="logo-password"></div>
            <input type="password" name="password" id="password" placeholder="Contraseña" required>

            @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
        </div>

        <a href="{{ route('password.request') }}">
            <div id="olvido_pswd">
                <p>¿Olvidó su contraseña?</p>
            </div>
        </a>

        <div class="boton-login">
            <button type="submit" id="input-button">
                Entrar
            </button>
        </div>

        <div id="registrate">
            <a href="{{url( 'registro' ) }}" class = "link">Regístrate</a>
        </div>
    </form>
    </div>

    </body>
</html>
