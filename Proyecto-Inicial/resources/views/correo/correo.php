<html>
      <head>
            <meta charset = "UTF-8">
            <title>Postulación a vacante</title>
            <style>
                  .body { background-color: #ECECEC; }
                  .titulo { color: #1e80b6; padding-top: 20px; padding-bottom: 10px; padding-left: 20px; padding-right: 20px; }
                  .div_contenido { color: #1e80b6; padding-top: 20px; padding-bottom: 10px; padding-left: 20px; padding-right: 20px; background-color: #ffffff !important }
            </style>
      </head>
      <body class = "body">
            
            <br/>
            <div class = "titulo">
                  <h2>Postulación para vacante: <?= $vacante ?></h2>
            </div>
            
            <hr>
            
            <div class = "div_contenido">
                  <label>Estimado reclutador,</label>
                  <br><br>
                  <?= $contenido; ?>
                  <br><br>
                  <label>Saludos.</label>
            </div>
            
            <div class = "div_contenido">
                  <?= $nombre; ?>
                  <br>
                  Teléfono: <?= $telefono; ?>
                  <br>
                  Correo: <?= $correo; ?>
            </div>

            <div class = "div_contenido">
                  Contenido enviado desde el Sistema de Seguimiento de Egresados de la Universidad Tecnológica de la Mixteca.
                  <b>wwww.sse.utm.mx</b>
            </div>
    </body>
</html>