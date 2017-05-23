<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--<title>Editar Perfil</title> -->
    <link href="{{ url('css/base.css') }}" rel="stylesheet">
    <link href="{{ url('assets/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- <link href="{{ url('assets/bootstrap/css/bootstrap-theme.min.css') }}" rel="stylesheet"> -->
</head>
<body>
  <header>
    <section class="contenido">
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
                <a class="configuration" href="#">
                  <img src="{{url('assets/images/configuration.png')}}">
                </a>
                <a class="user" href="#">
                  <img src="{{url('assets/images/user.png')}}">
                </a>
                <a class="home" href="#">
                  <img src="{{url('assets/images/home.png')}}">
                </a>

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
            
          </div>
    </section>
  </header>
  
  <div class="container">
      @yield('content')
  </div>

  <!-- jQuery -->
    <script src="{{ url('assets/jquery/jquery.js') }}"></script>
    <!-- Bootstrap JavaScript -->
    <script src="{{ url('assets/bootstrap/js/bootstrap.min.js') }}"></script>

</body>
