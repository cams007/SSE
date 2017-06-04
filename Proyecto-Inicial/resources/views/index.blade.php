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
  <form id="form_login">
    <div  class="usuario-login">
        <div id="logo-user"></div>
        <input type="text" name="usuario" id="usuario" placeholder="Matrícula" ></input>
    </div>
    <div class="password-login">
        <div id="logo-password"></div>
        <input type="password" id="password" placeholder="Contraseña"></input>
    </div>
    <div id="olvido_pswd"><p>¿Olvidó su contraseña?</p>
    </div>
    <div class="boton-login">
        <input type="submit" id="input-button" VALUE="ENTRAR"></input>
    </div>
    <div id="registrate">
      <a href="{{url('registro')}}" class="link">Regístrate</a>
    </div>
  </form>
</div>

</body>
</html>
