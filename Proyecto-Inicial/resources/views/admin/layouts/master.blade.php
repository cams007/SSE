<!DOCTYPE html>
<html lang="es">
  <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link href="{{ url('css/base.css') }}" rel="stylesheet">
      <title> SSE - @yield('title')</title>
      @yield('style')
      <!-- jQuery -->
      <script src="{{ url('assets/jquery/jquery.js') }}"></script>

      <!-- <link href="{{ url('assets/bootstrap/css/bootstrap-theme.min.css') }}" rel="stylesheet"> -->
      <!--Mensaje alert-->
  </head>
  <body>
  <div class="page-wrap">
    <section class="contenido">
      <header>
        <div id="barrasuperior">
        </div>
          <div id="header">
              <div id="nombre_usuario">
                    @if( Auth::guest() )
                        <a class="user-name" href="#">
                            <img src="{{ url('assets/images/user-name.png') }}">
                        </a>
                        <p>{{ Auth::user()->nombre }}</p>
                    @endif
              </div>
              <div id="iconos">
                  <!-- <a class="configuration" href="#">
                    <img src="{{url('assets/images/configuration.png')}}">
                  </a> -->
                  <ul class="nav">
                    <li><a  href="{{url('admin/home')}}"><img src="{{url('assets/images/home.png')}}"></a></li>
                    <li><a href="#"><img src="{{url('assets/images/user.png')}}"></a>
                      <ul>
                        <li><a href = "{{ url( 'change/password/admin' ) }}">Cambiar contraseña</a></li>
                        <li><a href="{{ route('admin.logout') }}" onclick="event.preventDefault(); 
                              document.getElementById('logout-form').submit();">
                              Cerrar sesión
                            </a>
                            <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
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
                @include('admin.partials.navbar')
              </div>
            </div>
      </header>
      <div class="block">
          @yield('content')
      </div>
    </section>
      @yield('script')
</div>
<footer>
</footer>
  </body>
</html>