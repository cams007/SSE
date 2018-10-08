@extends('layouts.ingreso')

@section('title', 'Registrarse')

@section('style')
    <link href="{{ url('css/registro.css') }}" rel="stylesheet">
    <link href="{{ url('css/notificationflash.css') }}" rel="stylesheet">
@stop

@section( 'script' )
	<script src="{{ url('js/ocultarelemento.js') }}"></script>
@stop

@section('content')
<div class="contenedor">
    @if(Session::has('message_danger'))
        <div class = "alert alert-danger flashmensasse" id = "message_alert">
            <em> {!! session('message_danger') !!}</em>
            <button id = "hide" type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        </div>
    @endif

  <div class="div-1">
		<p class="text-center">Registrarme</p>
	</div><!--div-1-->

    <div class="div-2" id="saludo">
      <div class="div-2-1">
        <div class="bienvenida">
                Hola! Estás a punto de iniciar tu registro en el Sistema de Seguimiento de Egresados de la UTM,
                de antemano te agradecemos por colaborar cordialmente con tu universidad.
        </div>
    </div>

    <div class="div-2-2">
        <form class="form-horizontal" role="form" method="POST" action="{{ route('crearUsuario.submit') }}">
            {{ csrf_field() }}
            <div class="label">Matricula:*</div>
                <div class="div-input {{ $errors->has('matricula') ? ' has-error' : '' }}">
                    <input type="text" name="egresado_matricula" id="entradas" placeholder="i.e. 2010123456" value="{{ old('matricula') }}" required autofocus>

                    @if ($errors->has('matricula'))
                        <span class="help-block">
                            <strong>{{ $errors->first('matricula') }}</strong>
                            error
                        </span>
                    @endif
                </div>
                <div class="label">Correo electrónico:*</div>
                <div class="div-input{{ $errors->has('correo') ? ' has-error' : '' }}">
                    <input type="email" value="{{ old( 'correo' ) }}" name="correo" id="entradas" placeholder="correo@ejemplo.net" required>

                    @if ($errors->has('correo'))
                        <span class="help-block">
                            <strong>{{ $errors->first('correo') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="label">Contraseña:*</div>
                <div class="div-input{{ $errors->has('password') ? ' has-error' : '' }}">
                  <input type="password" name="password" id="entradas" placeholder = "Contraseña" required>
                </div>

                <div class="label">Confirmar contraseña:*</div>
                <input type="password" name="password_confirmation" id="entradas" placeholder = "Confirme contraseña" required>
                
                <div class="last-label">* Campos obligatorios</div>

                <div class="btn-group">
                    <a href="{{url('/')}}" class="button1"> Cancelar</a>
                    <button type="submit">Registrarse </button>
              </div>
        </form>
    </div>
  </div>

  <div class="div-3">
      <p>Si no recuerdas tu matrícula comunícate a las Coordinación de Vinculación de Alumnos y Egresados UTM a los teléfonos:</p>
  </div>
  <div class="div-4">
    <p>(953) 53 203 99 o (953) 53 20214 ext. 113 o 116.</p>
    <p>De lunes a Viernes de 8:00 a 13:00 y de 16:00 a 19:00 hrs.</p>
  </div>


    <div id="privacidad" class="modaloverlay">
        <div class="modal">
            <a href="{{url('/')}}" class="close">&times;</a>
                <div class="contenedor-2">
                  <div id="avisoTitulo" class="emergente-aviso-privacidad">Aviso de privacidad</div>
                  <div id="textoCompleto" class="emergente-texto-central">
                  La Universidad Tecnológica de la Mixteca, con domicilio en carretera a acatlima Km. 2.5, Huajuapan de León, Oaxaca.
                   utilizará tus datos personales recabados de este sistema para realizar un seguimiento preciso de las actividades
                   profesionales de nuestro egresados que servirá como instrumento de análisis estadístico del desempeño académico
                   de tu universidad. Tu información se tratará con absoluta confidencialidad, y solo será para uso del sistema,
                  ni empleadores, ni personas ajenas al sistema podrán visualizarla. Para mayor información acerca del tratamiento
                  y de los derechos que puedes hacer valer, puedes acceder al aviso de privacidad completo a través de nuestra
                  oficina de seguimiento a egresados, ubicada en la misma dirección.
                </div>

                <div id="a" class="column">
                    <a id="leerAviso" href="#privacidad" onclick="mostrarAviso()" class="aviso-privacidad">Leer aviso de privacidad completo.</a>
                </div>

                <div class="div-btn">
                  <div class="btn1">
                  <a href="{{url('/')}}"><button class="emergente-button1">Cancelar</button></a>
                </div>
                <div class="btn-2">
                  <a href="#"><button class="emergente-button2" onclick="closeModal()">Aceptar</button></a>
                </div>
                </div>
              </div>
        </div>
    </div>
  </div><!--contenedor-->

    <script type="text/javascript">
        function closeModal()
        {
            document.getElementById("privacidad").style.display = "none";
        }

        function mostrarAviso(){
            document.getElementById("avisoTitulo").innerHTML = "Aviso de privacidad Integral de la UTM.";

            texto = "<strong>I.- IDENTIDAD Y DOMICILIO DEL RESPONSABLE</strong><br><br>En cumplimiento a la Ley General de Protección de Datos Personales en Posesión de Sujetos Obligados, Ley General de Protección de Datos Personales en Posesión de Sujetos Obligados del Estado de Oaxaca y sus lineamientos, hacen de su conocimiento que recaba y trata sus datos personales para las finalidades que establece este Aviso de Privacidad. El Responsable del tratamiento y protección de sus datos personales es la Universidad Tecnológica de la Mixteca en adelante “la UTM” con domicilio en Km 2.5 Carretera a Acatlima, Huajuapan de León, Oaxaca, C.P. 69000.   <br><br> <strong>DATOS OBTENIDOS</strong><br> Los datos que solicitamos son: <br><br> <strong>DATOS DE IDENTIFICACIÓN: </strong>Nombre completo, género, día y mes de nacimiento, lugar de nacimiento, Domicilio, Teléfono particular y celular, Correo electrónico, Estado Civil, Firma, firma electrónica, RFC, CURP, Cartilla Militar, Nacionalidad, Edad, Nombres de familiares, dependientes y beneficiarios, Fotografía, Numero de Seguridad Social, Acta de nacimiento, origen étnico y lengua materna (hablante) y datos migratorios.<br><br> <strong>DATOS LABORALES: </strong> Documentos de reclutamiento y selección de personal, Documentos de nombramiento, documentos de incidencias, Documentos de Capacitación, Puesto, Domicilio de Trabajo, Referencias laborales, Referencias personales y Curriculum Vitae.<br><br> <strong>DATOS ACADEMICOS: </strong> Trayectoria educativa, Títulos, Cedula Profesional, Certificados,Reconocimientos.  <br><br> <strong>DATOS DIGITALES: </strong> Sitios web, bases de datos, archivos electrónicos.<br><br> <strong>DATOS PATRIMONIALES: </strong> Información Fiscal y Fianzas, Bienes muebles e inmuebles, Servicios contratados, Seguros, para efectos de becas a estudiantes: grado escolar, ocupación, ingresos y datos de identificación del tutor.<br><br> <strong>DATOS DE SALUD (Sensibles): </strong> Estado de Salud, Enfermedades, alergias e incapacidades Médicas.<br><br> <strong>DATOS BIOMETRICOS (Sensibles): </strong> Huella digital, Tipo de Sangre.<br><br> <strong>OTROS:</strong> Para efectos de dar cumplimiento a requerimientos de los autorizados federales, estatales o municipales de cualquier naturaleza y en el ejercicio de las acciones legales que deban ejercitarse en protección de los intereses y esfera jurídica de la responsable. El tratamiento de los datos personales mencionados tiene como propósito que “La UTM” cumpla con las obligaciones derivadas de las normas jurídicas que la rigen y las relaciones o actos jurídicos que tenga que colaborar para el cumplimiento de sus fines.<br><br> “LA UTM” se compromete a tratar bajo estrictas medidas de seguridad, garantizando siempre la confidencialidad de ellos.<br><br><strong>III. FUNDAMENTO LEGAL PARA EL TRATAMIENTO.</strong><br><br> El fundamento legal para llevar a cabo el tratamiento de Datos Personales son: artículos No. 16,17, 18, 25 y 26 de la Ley General de Protección de Datos Personales en Posesión de Sujetos Obligados; 09, 10, 11, 14 y 19 de la Ley de Protección de Datos Personales en Posesión de Sujetos Obligados del Estado de Oaxaca; y 87 fracción VI, incisos a) y b), y fracción III, inciso a); y 97 fracciones XI, XV y XVII de la Ley de Transparencia y Acceso a la Información Pública para el Estado de Oaxaca.<br><br> <strong>IV. FINALIDAD DE SU TRATAMIENTO.</strong><br><br> La recolección de los datos personales por parte de “La UTM”, se funda en el cumplimento de las siguientes finalidades:<br><br> <ul> <!--NO FUNCIONAN LAS LISTAS --> <li>Dar trámite al ingreso, permanencia, terminación y seguimiento de alumnos y egresados: nacionales y extranjeros.</li> <li>Diagnosticar, evaluar e informar el desempeño académico y extracurricular.</li> <li>Ofrecer los servicios y actividades que contribuyan con su formación integral.</li> <li>Ofrecer la difusión de conocimientos del más alto nivel ético, científico, tecnológico y profesional.</li> <li>Otorgar becas y/o prórrogas, en caso de cumplir los requisitos establecidos.</li> <li>Realizar reportes semanales, mensuales y anuales.</li> <li>Generar y actualizar bases de datos de alumnos, docentes, egresados, trabajadores, proveedores nacionales y extranjeros y de resguardos.</li> <li>Realizar trámites de incorporación de los alumnos al sistema de Seguridad Social (IMSS)</li> <li>Para dar cumplimiento a diversas disposiciones legales estatales y federales que nos apliquen en materia de auditoria en cualquiera de las actividades que esa área realice.</li> <li>Gestionar los trámites necesarios ante las autoridades escolares correspondientes e integrar su expediente escolar.</li> <li>Dar trámite al ingreso, permanencia y terminación del personal nacional y extranjero, generación de reportes presupuestales, cumplimiento de obligaciones fiscales y en materia de Seguridad Social y portabilidad pago de nómina y transferencia a monedero electrónico de vales de despensa y cualquier otra finalidad relacionada con el trabajador durante la vigencia de la relación laboral principalmente.</li> <li>Generar y actualizar bases de datos que incluyan resguardos institucionales patrimoniales digitales y físicas para nutrir plataformas digitales con fines de enseñanza e investigación.</li> <li>Para la elaboración de informes y asistencia técnica y/o capacitación, y/o colaboración con las comunidades, productores, en instituciones municipales, estatales federales e internacionales.</li><li>Para formalizar actos e instrumentos jurídicos que establezcan obligaciones de dar, hacer o no hacer en materia de adquisiciones, arrendamientos y servicios del sector público con base en normas de derecho público o de derecho privado cuando proceda.</li><li>Para generar y mantener sistemas de información de la biblioteca digital para la creación y/o publicación y almacenamiento de documentos digitales y electrónicos.</li> <li>Para presentación y difusión de eventos culturales, académicos, de investigación y sociales, que se relacionen con el quehacer universitario.</li> <li>Para la suscripción de convenios en materia administrativa y académica, de tratamiento legal de cualquier índole relacionadas con cualquiera de las áreas con base en las funciones sustantivas y adjetivas de la institución.</li> <li>Para solicitar la generación de facturas, elaboración de reportes aplicables a nómina y gestionar pago de facturas correspondientes.</li> <li>Para informar cursos y eventos de carácter institucional y oferta laboral.</li> <li>Para realizar actos y ejercitar acciones de índole jurídico y extrajudicial apegados a la ley tendientes al cuidado y tutela y protección de los intereses jurídicos de la UTM.</li></ul> <br><br> La UTM no realizará transferencias de datos personales recabados que requieran su consentimiento, salvo las excepciones previstas en los artículos 22, 66 y 70 de la Ley General de Transparencia y Acceso a la Información y artículos 15 y 62 de la Ley de Transparencia y Acceso a la Información para el Estado de Oaxaca. Al proporcionar sus datos a la UTM se da por entendido que está de acuerdo con los términos de este aviso, las finalidades del tratamiento de los datos así como los medios y procedimiento que ponemos a su disposición para ejercer sus derechos de Acceso, Rectificación, cancelación y oposición de este aviso de privacidad.<br><br> <strong>V. MEDIOS Y PROCEDIMIENTOS PARA EJERCER SUS DERECHOS ARCO.</strong><br><br> Usted o su representante legal podrá ejercer cualquiera de los derechos de acceso, rectificación, cancelación u oposición (Derechos ARCO), así como revocar su consentimiento para el tratamiento de sus datos personales acudiendo a la Unidad de Transparencia de la UTM o enviando un correo electrónico a la dirección electrónica: <a href='mailto:transparenciaderechosarco@mixteco.utm.mx' target='_blank'>transparenciaderechosarco@mixteco.utm.mx</a><br><br> Para poder atender en tiempo y forma sus Derechos ARCO es necesario que en su petición señale lo siguiente:<br><br><ul><li>El nombre del titular, su domicilio y su cuenta de correo electrónico para comunicarle la respuesta a su solicitud.</li><li>Adjuntar el documento que acredite su identidad o, en su caso, la representación legal del titular.</li><li>La descripción clara y precisa de los datos personales respecto de los que se busca ejercer alguno de los derechos antes mencionados.</li><li>Descripción del derecho ARCO que se pretende ejercer.</li><li>Cualquier otro elemento o documento que facilite la localización de los datos personales.</li></ul><br> Para el caso de las solicitudes de rectificación el titular deberá indicar las modificaciones a realizarse y aportar la documentación que sustente su petición.<br>En caso de que la información proporcionada sea errónea o insuficiente, o bien, no se acompañe de los documentos de acreditación correspondientes, cualquiera de la Unidad de Transparencia, podrá requerirle que aporte los elementos o documentos necesarios para dar trámite a la misma dentro de los cinco (5) días hábiles siguientes a la recepción de la solicitud. Usted contará con diez (10) días hábiles para atender el requerimiento, contados a partir del día siguiente en que haya sido recibido. De no dar respuesta en dicho plazo, se tendrá por no presentada la solicitud correspondiente. La Unidad de Transparencia le comunicará la determinación adoptada, en un plazo máximo de veinte (20) días hábiles contados desde la fecha en que se recibió la solicitud, a efecto de que, si resulta procedente, haga efectiva la misma dentro de los quince (15) días hábiles siguientes a que se comunique la respuesta, la que se dará vía electrónica a la dirección de correo que se especifique en la solicitud.<br><br> <strong>VI. DOMICILIO DE LA UNIDAD DE TRANSPARENCIA: </strong><br><br> Carretera a Acatlima km 2.5, Huajuapan de León, Oaxaca, C.P. 69000 Recursos Materiales de la U.T.M. Tel. 953-53-2 45 60 Ext. 165 y 701. <br><br> <strong>VII. CAMBIOS AL AVISO DE PRIVACIDAD: </strong><br><br>En caso de que exista un cambio de este aviso de privacidad, lo haremos de su conocimiento en nuestro portal de Internet: <a href='http://www.utm.mx/avisodeprivacidad/index.html' target='_blank'>http://www.utm.mx/avisodeprivacidad/index.html</a>";
            var avisoIntegral = document.getElementById("textoCompleto");
            avisoIntegral.innerHTML = texto;
            document.getElementById("leerAviso").innerHTML = "";

        }

    </script>
@stop
