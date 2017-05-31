@extends('layouts.master')

@section('title', 'Eventos Académicos')

@section('style')
	<link href="{{ url('css/perfil.css') }}" rel="stylesheet">
	<link href="{{ url('css/ofertas.css') }}" rel="stylesheet">
@stop

@section('content')
	<h1 class="text-center">Eventos Académicos</h1>
	<hr class="hr">

	<div class="clearfix">
		<aside class="column" id="cssmenu">
			@include('partials.AsideEventosUtm')
		</aside>
		<div class="column content">
			<div class="filtro_3">
				<input type="text" name="busquedaEvento" value="busqueda de evento" class="inputBusqueda">
			</div>

			<div>
				<figure>
	 				<img src="{{ url('assets/images/acad1UTM.PNG') }}" width="400" height="353">
					<figcaption><h2>Seminario EQUIPAR</h2></figcaption>
				</figure>
				<img src="{{ url('assets/images/eventos_calendar.png') }}" alt="" class="iconos">
				<h3>Martes 07 de Junio de 2017, 10:00 hrs</h3><!--Fecha-->

				<img src="{{ url('assets/images/eventos_location.png') }}" alt="" class="iconos">
				<h3>Auditorio UTM. Huajuapan de león Oaxaca</h3><!--Ubicacion-->
			</div>

			<div>
				<figure>
	 				<img src="{{ url('assets/images/acad2UTM.PNG') }}" width="400" height="353">
					<figcaption><h2>3er encuentro universitario Ing. Industrial</h2></figcaption>
				</figure>
				<img src="{{ url('assets/images/eventos_calendar.png') }}" alt="" class="iconos">
				<h3>Lunes 15 de Junio 2017, 09:00 hrs</h3><!--Fecha-->

				<img src="{{ url('assets/images/eventos_location.png') }}" alt="" class="iconos">
				<h3>Auditorio UTM. Huajuapan de león Oaxaca</h3><!--Ubicacion-->
			</div>
		</div>	
	</div>
	<!-- Paginación -->
	<div class="paginate">
		<a class="back" href="#"><img src="{{ url('assets/images/paginator_back.png') }}"></a>
      	<a class="active" href="#">1</a>
      	<a class="page" href="#">2</a>
      	<a class="page" href="#">3</a>
      	<a class="page" href="#">4</a>
      	<a class="page" href="#">5</a>
      	<a class="forward" href="#"><img src="{{ url('assets/images/paginator_forward.png') }}"></a>
	</div>
@stop