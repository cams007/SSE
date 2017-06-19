<!DOCTYPE html>
<html lang="es">
  <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title> SSE - @yield('title')</title>
      <link href="{{ url('css/base.css') }}" rel="stylesheet">
      @yield('style')

      <!-- <link href="{{ url('assets/bootstrap/css/bootstrap-theme.min.css') }}" rel="stylesheet"> -->
  </head>
  <body>
  <div class="page-wrap">
    <section class="contenido">
      <header>
        <div id="barrasuperior">
        </div>
          <div id="header">
              <div id="nombre_usuario">

                  <a class="user-name" href="#">
                    <img src="{{ url('assets/images/user-name.png') }}">
                  </a>
                  <p>Juan Perez Sanchez</p>
              </div>
              <div id="iconos">
                  <!-- <a class="configuration" href="#">
                    <img src="{{url('assets/images/configuration.png')}}">
                  </a> -->
                  <ul class="nav">
                    <li><a  href="#"><img src="{{url('assets/images/home.png')}}"></a></li>
                    <li><a href="#"><img src="{{url('assets/images/user.png')}}"></a>
                      <ul>
                        <li><a  href="{{url('perfil')}}">Mi perfil</a></li>
                        <li><a  href="#">Cambiar contraseña</a></li>
                        <li><a  href="#">Cerrar sesión</a></li>
                        </ul>
                    </li>
                </ul>
              </div>
              <div class="headercontainer">
                <div id="logo_see_contenido">
                  <img src="{{url('assets/images/logo_see_contenido.png')}}">
                </div>
                <div id="titulo_contenido"><p>Sistema de Seguimiento de Egresados</p></div>
                <div id="logo_utm_contenido">
                  <img src="{{url('assets/images/logo_utm_contenido.png')}}">
                </div>
              </div>
              <div class="menucontainer">
                @include('partials.navbar')
              </div>
            </div>
      </header>

      <div class="block">
          @yield('content')
      </div>
    </section>

    <!-- jQuery -->
      <script src="{{ url('assets/jquery/jquery.js') }}"></script>
      @yield('script')

</div>
<footer>
</footer>
  </body>
</html>
