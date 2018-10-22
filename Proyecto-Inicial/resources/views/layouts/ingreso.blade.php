<!DOCTYPE html>
<html lang="es">
  <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title> SSE - @yield('title')</title>
      <link href="{{ url('css/baseIngreso.css') }}" rel="stylesheet">
      @yield('style')

      <!-- <link href="{{ url('assets/bootstrap/css/bootstrap-theme.min.css') }}" rel="stylesheet"> -->
  </head>
  <body>
    <section class="contenido">
      <header>
        <div id="barrasuperior">
        </div>
          <div id="header">
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
  </body>
</html>
