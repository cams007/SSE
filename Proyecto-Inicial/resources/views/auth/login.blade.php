<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <title>Login de egresados</title>
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

    <form id="form_login" role="form" method="POST" action="{{ route('login.submit') }}">
        {{ csrf_field() }}

        <div class="usuario-login">
            <div id="logo-user"></div>
            <input type="email" id="correo" name="correo" value="{{ old('correo') }}" placeholder="Correo electrónico" required autofocus>

            <!-- Muestra los mensajes de error cuando el usuario ingresa datos incorrectos -->
            {!!
                $errors->first( 'correo', '<span class="help-block">:message</span>' )
            !!}

        </div>

        <div class="password-login">
            <div id="logo-password"></div>
            <input type="password" id="password" name="password" placeholder="Contraseña" required>

            {!!
                $errors->first( 'passwword', '<span class="help-block">:message</span>' )
            !!}

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

        @if( Auth::guest() )
            <li class="registro-boton">
                <a href="{{ route( 'register' ) }}">Regístrate</a>
            </li>
        @endif

    </form>
    </div>

    </body>
</html>
