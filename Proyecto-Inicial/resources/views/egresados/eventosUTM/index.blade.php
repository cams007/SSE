@extends('layouts.master')

@section('title', 'Eventos UTM')

@section('style')
	<link href="{{ url('css/perfil.css') }}" rel="stylesheet">
@stop

@section('content')
	<h1 class="text-center">Eventos UTM</h1>
	<hr class="hr">
	<div class="clearfix">
		<aside class="column" id="cssmenu">
			@include('partials.AsideEventosUtm')	
		</aside>
		<!--<div class="column content">-->
			<div class="filtro_3">
				<input type="text" name="busquedaEvento" value="busqueda de evento">
			</div>

			<div>
				<figure>
	 				<img src="{{ url('assets/images/portada.JPG') }}" width="400" height="353">
					<figcaption><h2>Orquesta de Oaxaca</h2></figcaption>
				</figure>
				<img src="{{ url('assets/images/eventos_calendar.png') }}" alt="" class="iconos">
				<h3>Martes 15 de diciembre 2017, 10:00 hrs</h3><!--Fecha-->

				<img src="{{ url('assets/images/eventos_location.png') }}" alt="" class="iconos">
				<h3>Auditorio UTM. Huajuapan de león Oaxaca</h3><!--Ubicacion-->
			</div>
		<!--</div>-->
	</div>


@stop