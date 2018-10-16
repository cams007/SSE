<!DOCTYPE html>
<html lang="es">
  <head>

      <link href='{{url('assets/images/logo_see_contenido.png')}}' rel='shortcut icon' type='image/png'>
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
                    @if( Auth::user() )
                          @if(Auth::user()->egresado->imagen_url)
                            <img src="{{ url(Auth::user()->egresado->imagen_url) }}" style="width: 24px; height: 24px; border-radius: 50%">
                          @else
                            <img src="{{ url('assets/images/user-name.png') }}">
                          @endif
                        <p>
                          {{ Auth::user()->egresado->nombres }}
                          {{ Auth::user()->egresado->ap_paterno }}
                          {{ Auth::user()->egresado->ap_materno }}
                        </p>
                    @endif
              </div>
              <div id="iconos">
                  <!-- <a class="configuration" href="#">
                    <img src="{{url('assets/images/configuration.png')}}">
                  </a> -->
                  <ul class="nav">
                    <li><a href="{{url('home')}}"><img src="{{url('assets/images/home.png')}}"></a></li>
                    <li><a href="#"><img src="{{url('assets/images/user.png')}}"></a>
                      <ul>
                        <li><a  href="{{url('perfil')}}">Mi perfil</a></li>
                        <li><a  href="{{ url( 'change/password' ) }}">Cambiar contraseña</a></li>
                        <li>
                            <a href="{{ route('user.logout') }}"
                                onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                                Cerrar sesión
                            </a>
                            <form id="logout-form" action="{{ route('user.logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
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
