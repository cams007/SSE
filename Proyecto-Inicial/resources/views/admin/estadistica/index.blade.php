@extends('admin.layouts.master')

@section('title', '&Iacute;ndices y estad&iacute;sticas')

@section( 'head' )
	<!-- Se define el asset para renderizar el grafico -->
	{!! Charts::assets() !!}
@show

@section('style')
	<link href = "{{ url( 'css/paginacion.css' ) }}" rel = "stylesheet">
	<!-- <link href = "{{ url( 'css/ranking.css' ) }}" rel = "stylesheet"> -->
	<link href = "{{ url( 'css/cssadmin/estadisticas.css' ) }}" rel = "stylesheet">
@stop

<!-- Agregar scripts -->
@stack( 'scripts' )
	<!-- Solo define la funcion descargar -->
	{!! Html:: script( 'js/div2Image.js' ) !!}
	<!-- Biblioteca para convertir elementos del DOM en imagenes PNG, SVG, etc. -->
	{!! Html:: script( 'js/dom-to-image.js' ) !!}
	<!-- Libreria para descargar archivos en el cliente local -->
	{!! Html:: script( 'js/FileSaver.js' ) !!}

@section('content')

	<div class="contenedor"><!-- contenedor -->

		<div class = "div-1">
			<p>&Iacute;ndices y Estad&iacute;sticas</p>
		</div>

		<div class = "opciones-reporte" id = "opciones-reporte">
			<div>
				<!--
					Se define un formulario tipo SELECT, con un metodo GET se envia el formulario al
					controlador que lo llamo (IndicesEstadisticasController) y otra vez se renderiza esta vista.
				-->
				{!! Form::open(['url' => 'admin/estadisticas', 'method' => 'GET', 'role' => 'search']) !!}

				{{ csrf_field() }}

				<label class = "label-egresados" id = "label-egresados">Estad&iacute;sticas Egresados</label>
				{!! Form::select('egresados',
					[
						"notValue" => "Elige una opción",
						"0" => 'G&eacute;nero de los encuestados',
						"1" => 'Egresados con empleo',
						"2" => 'Tiempo hasta conseguir primer empleo',
						"3" => 'Dificultades para conseguir empleo',
						"4" => 'Tipo de organismo donde laboran',
						"5" => 'Tiempo de dedicaci&oacute;n al trabajo',
						"6" => 'Tipo de formaci&oacute;n profesional en el que se desempeñan',
						"7" => 'Salario de los empleados',
						"8" => 'Titulados y no titulados',
						"9" => 'Tiempo para obtener el t&iacute;tulo',
						"10" => 'Arraigo de egresados en su zona de estudios',
						"11" => 'Satisfacci&oacute;n de los egresados en cuanto al clima universitario',
						"12" => 'Opin&oacute;n de los egresados en cuanto al clima universitario',

						// Satisfaccion de la Formacion Profesional
						"20" => 'Habilidades que requieren dominar al momento de ejercer tu profesion por primera vez',
						"21" => "Valores y actitudes importantes al momento de ejercer tu profesion por primera vez",
						"22" => "¿Como calificas los servicios escolares y administrativos?",
						"23" => "¿Como calificas los equipos, instrumentos, maquinaria y herramientas de la UTM?",
						"24" => "¿Como calificas la limpieza de la insfraestructura de la UTM?",
						"25" => "¿Como calificas la capacidad de la insfraestructura de la UTM?",
						"26" => "¿Como calificas el desempeño de los docentes de la UTM?",
						"27" => "¿Como calificas las tecnicas y metodos de enseñanza de los docentes de la UTM?",
						"28" => "¿Como calificas la forma y pertinencia de evaluacion aplicados por los docentes de la UTM?",

						// Desempeño Profesional de los Egresados
						"29" => "Habilidades importantes que debe desarrollar el egresado",
						"30" => "Carencia de conocimientos basicos del egresado",
						"31" => "¿Que habilidades no demostro el egresado? ",
						"32" => "El egresado careció del dominio de alguna area de conocimiento basico?",
						"33" => "¿El egresado debio actualizar sus conocimientos?",
						"20" => 'Habilidades que requieren dominar al momento de ejercer tu profesión por primera vez',
						"21" => "Valores y actitudes importantes al momento de ejercer tu profesión por primera vez",
						"22" => "¿Cómo calificas los servicios escolares y administrativos?",
						"23" => "¿Cómo calificas los equipos, instrumentos, maquinaria y herramientas de la UTM?",
						"24" => "¿Cómo calificas la limpieza de la insfraestructura de la UTM?",
						"25" => "¿Cómo calificas la capacidad de la insfraestructura de la UTM?",
						"26" => "¿Cómo calificas el desempeño de los docentes de la UTM?",
						"27" => "¿Cómo calificas las técnicas y metodos de enseñanza de los docentes de la UTM?",
						"28" => "¿Cómo calificas la forma y pertinencia de evaluación aplicados por los docentes de la UTM?"
 					],
					null, [ 'class' => 'opcion-egresados', "onchange" => "this.form.submit()" ] )
				!!}
				{!!Form::close() !!}

				{!! Form::open(['url' => 'admin/estadisticas', 'method' => 'GET', 'role' => 'search']) !!}

				<label class = "label-empleadores" id = "label-empleadores">Estad&iacute;sticas Empleadores</label>
				{!! Form::select('empleadores',
					[
						// Desempeño Profesional del Egresado
						"notValue" => "Elige una opción",
						"29" => "Habilidades importantes debe desarrollar el egresado",
						"30" => "Carencia de conocimientos básicos del egresado",
						"31" => "¿Qué habilidades no demostró el egresado? ",
						"32" => "¿El egresado careció del dominio de alguna área de conocimiento basico?",
						"33" => "¿El egresado debió actualizar sus conocimientos?",
						"34" => "Valores y actitudes importantes que debe tener el egresado ",
						"35" => "¿Qué valores no demostró el egresado?",
						"13" => 'Carreras m&aacute;s demandadas',
						"14" => 'Opin&oacute;n de los empleadores sobre la formaci&oacute;n profesional de los egresados',
						"15" => 'Opini&oacute;n de los empleadores sobre el desempeño laboral del egresado',
						"16" => 'Importancia otorgado al t&iacute;tulo profesional para contratar a egresados',
						"17" => 'Importancia de la experiencia laboral para contratar a un profesional',
						"18" => 'Importancia de la imagen de la universidad para contratar a egresados',
						"19" => 'Confianza de los empleadores para la contratación de egresados de la universidad'
						],
					null, [ 'class' => 'opcion-empleadores', "onchange" => "this.form.submit()"] )
				!!}
				<!-- Cerramos el formulario -->
				{!!Form::close() !!}
			</div>
		</div>

		<!-- Contenedor de grafica -->
		<div class="chart" id = "chart">
			<!-- Renderiza el chart que se define desde el controlador IndicesEstadiscticasController -->
			{!! $chart->render() !!}
		</div>

		<!-- Boton para convertir el grafico en imagen PNG,
		     A traves de la libreria FileSaver guarda la imagen
		     en la carpeta de descarga local.
		-->
		<button id = "btn-guardar"  onclick = "descargar();">Descargar</button>

	</div> <!-- Contenedor Principal -->
@stop
