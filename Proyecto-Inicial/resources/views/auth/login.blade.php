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
            <a  onclick="mostrarAviso()" href="#modalAcercaDe"><div id="logo_info"></div></a>
        </div>
        
    <div id="modalAcercaDe" class="modaloverlay">
        <div class="modal">
                <div class="contenedor-2">
                  <div id="avisoTitulo" class="emergente-aviso-privacidad">Aquí encontrarás</div>
                  <div id="textoCompleto" class="emergente-texto-central">
                </div>
                    <div class="div-btn">
                        <div class="btn-2">
                            <a href="#"><button class="emergente-button2" >Aceptar</button></a>
                        </div>
                    </div>
                </div>
            </div>
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
            <li class="registro-boton"><a href="{{ route('register') }}">Regístrate</a></li>
        @endif

    </form>
    </div>

    </body>
</html>

<script type="text/javascript">
    function mostrarAviso()
        {
            var elemento=document.getElementById("modalAcercaDe");
 
 
                document.getElementById("textoCompleto").innerHTML = "<ul><li>Ofertas Laborales</li><li>Directorio de empresas</li><li>Ranking de las mejores empresas</li><li>Tips y consejos</li><li>Historias de éxito</li><li>Eventos y más...</li></ul>";
    
            }
            
        
</script>

