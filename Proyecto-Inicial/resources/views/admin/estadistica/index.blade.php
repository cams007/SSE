@extends('admin.layouts.master')

@section('title', '&Iacute;ndices y estad&iacute;sticas')

@section( 'head' )
	<!-- 	Se debe definir en la cabecera lo siguiente para que puede funcionar. -->
	{!! Charts::assets() !!}
	
@show

@section('style')
	<link href = "{{ url( 'css/paginacion.css' ) }}" rel = "stylesheet">
	<link href = "{{ url( 'css/ranking.css' ) }}" rel = "stylesheet">	
@stop

<!-- Agregar scripts -->
@stack( 'scripts' )
    {!! Html:: script( 'js/div2Image.js' ) !!}

@section('content')
	
	<div class="contenedor"><!-- contenedor -->

		<div class = "div-1">
			<p class = "text-center">&Iacute;ndices y Estad&iacute;sticas</p>
		</div>

		<label class = "label-egresados" id = "label-egresados">Egresados</label>
		<div class = "opciones-egresados" id = "opciones-egresados">		
			<div>
				<!--
					Se define un formulario tipo SELECT, con un metodo GET se envia el formulario al
					controlador que lo llamo (IndicesEstadisticasController) y otra vez se renderiza esta vista.
				-->
				{!! Form::open(['url' => 'admin/estadisticas', 'method' => 'GET', 'role' => 'search']) !!}
				{!! Form::select('carrera',
					[
						"0" => 'G&eacute;nero de los encuestados',
						"1" => 'Egresados con empleo',
						"2" => 'Tiempo hasta conseguir primer empleo',
						"3" => 'Dificultades para conseguir empleo',
						"4" => 'Tipo de organismo donde laboran',
						"5" => 'Tiempo de dedicaci&oacute;n al trabajo',
						"6" => 'Tipo de formaci&oacute;n profesional',
						"7" => 'Salario de los empleados',
						"8" => 'Titulados y no titulados',
						"9" => 'Tiempo para obtener el t&iacute;tulo',
						"10" => 'Arraigo de egresados en su zona de estudios',
						"11" => 'Satisfacci&oacute;n de los egresados en cuanto al clima universitario',
						"12" => 'Opinion de los egresados en cuanto al clima universitario',
						
						"13" => 'Carreras mas demandadas',
						"14" => 'Opin&oacute;n de los egresados sobre la formaci&oacute;n profesional de los egresados',
						"15" => 'Opini&oacute;n de los empleadores sobre el desempeño laboral del egresado',
						"16" => 'Importancia otorgado del titulo profesional para contratar a egresados',
						"17" => 'Importancia de la experiencia laboral para contratar a un profesional',
						"18" => 'Importancia de la imagen de la universidad para contrata a egresados',
						"19" => 'Confianza de los empleadores para la contratacion de egresados de la universidad'
					],
					null, [ 'class' => 'seleccion-carrera', "onchange" => "this.form.submit()"] )
				!!}
				<!-- Cerramos el formulario -->
				{!!Form::close() !!}
			</div>
		</div>

		<!-- Contenedor de grafica -->
		<div class="chart" id="chart">
			<!-- Renderiza el chart que se define desde el controlador IndicesEstadiscticasController -->
			{!! $chart->render() !!}
		</div>
			<button id = "btn-guardar" onclick = "cargar();">Descargar</button>
		<div id="img-out">
		
		</div>

	</div> <!-- Contenedor Principal -->
@stop