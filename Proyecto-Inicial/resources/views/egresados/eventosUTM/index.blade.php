@extends('layouts.master')

@section('title', 'Eventos UTM')

@section('style')
	<link href="{{ url('css/perfil.css') }}" rel="stylesheet">
@stop

@section('content')
 <div class="contenedor"><!--inicio contenedor-->

	<div class="div-1"> <!--incio div-1-->

		<p class="text-center">Eventos UTM</p>
		<hr class="hr">

	</div><!--fin div-1-->

	<div class="div-2"><!--inicio div-2-->

		<div class="div-2-1"><!--inicio div-2-1-->

			<!--<div class="clearfix">-->
			<aside class="column" id="cssmenu">
				@include('partials.AsideEventosUtm')
			</aside>

		</div><!--fin div-2-1-->

		<div class="div-2-2"><!--inicio div-2-2-->
			<!--<div class="column content">-->
			<div class="div-2-2-1"> <!--inicio div-2-2-1-->

				<div class="filtro_3">
					<input type="text" name="busquedaEvento" value="busqueda de evento" class="inputBusqueda">
				</div>

			</div><!--fin div-2-2-1-->

			<div class="div-2-2-2"><!--inicio div-2-2-2-->

				<div class="div-2-2-2-1"><!--inicio div2-2-2-1-->

						<div class="foto1"><!--incio foto-->
					<!--<figure>
	 					<img src="{{ url('assets/images/acad1UTM.PNG') }}" width="400" height="353">
						<figcaption><h2>Seminario EQUIPAR</h2></figcaption>
					</figure>-->
						</div><!--fin foto-->

					<div class="descripcion-foto1"><!--inicio descripcion-foto-->
						<div class="texto-descripcion"><!--inicio orquesta-div-1-->
							<h2>Orquesta de Oaxaca</h2>
						</div><!--fin orquesta-div-1-->
						<div class="fecha"><!--inicio fecha-div-2-->
							<img src="{{ url('assets/images/eventos_calendar.png') }}" alt="" class="iconos">
							<h3>Martes 07 de Junio de 2017, 10:00 hrs</h3>

							<img src="{{ url('assets/images/eventos_location.png') }}" alt="" class="iconos">
							<h3>Auditorio UTM. Huajuapan de león Oaxaca</h3>
						</div><!--fin fecha-div-2-->
						<div class="asistiras"><!--inicio foto1-asistiras-->
							<h3>¿Asistirás?
						</div><!--fin foto1-asistiras-->

						<div class="botones-si-no">
							<input type="button" class="si" value="Sí">
							<input type="button" class="no" value="No">
						</div>
					</div><!--fin descripcion-foto-->

				</div><!--fin div-2-2-2-1-->

				<div class="div-2-2-2-2"><!--inicio div-2-2-2-2-->

					<div class="foto2"><!--inicio foto2-->
						<!--<figure>
	 					<img src="{{ url('assets/images/biblioteca.JPG') }}" width="400" height="353">
						<figcaption><h2>Orquesta de Oaxaca</h2></figcaption>
					</figure>-->
					</div><!--fin foto2-->

					<div class="descripcion-foto2"><!--inicio descripcion-foto2-->
						<div class="texto-descripcion"><!--inicio jarabe-->
						<h2>Jarabe Mixteco</h2>
					</div><!--fin jarabe-->
					<div class="fecha"><!--inicio fecha-jarabe-->
						<img src="{{ url('assets/images/eventos_calendar.png') }}" alt="" class="iconos">
						<h3>Lunes 25 de enero 2017, 12:00 hrs</h3><!--Fecha-->

						<img src="{{ url('assets/images/eventos_location.png') }}" alt="" class="iconos">
						<h3>Auditorio UTM. Huajuapan de león Oaxaca</h3><!--Ubicacion-->
					</div><!--fin fecha-jarabe-->

					<div class="asistiras"><!--inicio foto1-asistiras-->
						<h3>¿Asistirás?
					</div><!--fin foto1-asistiras-->

					<div class="botones-si-no">
						<input type="button" class="si" value="Sí">
						<input type="button" class="no" value="No">
					</div>

					</div><!--fin descripcion-foto2-->

				</div><!--fin div-2-2-2-2--->

			</div><!--fin div-2-2-3-->

		<div class="div-2-2-3"><!--inicio div-2-2-3-->

			<strong>Radio Buttons</strong>

		</div><!--fin div-2-2-3-->

		<!--</div>-->

	</div><!--fin div-2-2-->
	<!--</div>-->
	</div><!--fin div-2-->

</div><!--fin contenedor-->

@stop
