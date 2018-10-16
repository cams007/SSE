@extends('layouts.master')

@section('title', 'Ofertas laborales')

@section('style')	
	<link href="{{ url('css/datosEmpresa.css') }}" rel="stylesheet">	
	<link href="{{ url('css/modal.css') }}" rel="stylesheet">
	<link href="{{ url('css/table.css') }}" rel="stylesheet">
	<link href="{{ url('css/paginacion.css') }}" rel="stylesheet">
@stop

@php
	$carrera = array(
		0=>'Ingeniería en Diseño',
		1=>'Ingeniería en Computación',
		2=>'Ingeniría en Alimentos',
		3=>'Ingeniería en Electrónica',
		4=>'Ingeniería en Mecatrónica',
		5=>'Ingeniería Industrial',
		6=>'Ingeniería en Física Aplicada',
		7=>'Licenciatura en Ciencias Empresariales',
		8=>'Licenciatura en Matemáticas Aplicadas',
		9=>'Licenciatura en Estudios Mexicanos',
		10=>'Ingeniería en Mecánica Automotriz'
	);
@endphp

@section('content')
<div class="contenedor"><!--contenedor-->
	<div class="div-1"> <!--incio div-1-->
		<p class="text-center">Datos de empresa</p>
	</div><!--fin div-1-->		
	
	<div class="div-2">
		<div class="div-2-1">
			<aside id="cssmenu" class="column hrV">
				@include('partials.asideEmpresa')
			</aside>
		</div>
		<div class="column content">				
			<!-- Resultados -->
			@if( $totalOferta->total > 0 )
				<div class="se-encontraron">
					<p>Se encontraron {{ $totalOferta->total }} ofertas</p>
				</div>
				<div class="div-4"><!--div-4-->
					<table>
						<thead>
							<tr>
								<th>Título del empleo</th>
								<th>Descripción</th>
								<th>Ubicación</th>
								<th>Carrera</th>
								<th>Salario</th>
								<th>Status</th>
							</tr>
						</thead>
						<tbody>
							@foreach($ofertas as $oferta)
								<tr>
									<td> {{ $oferta->titulo_empleo }} </td>
									<td>{{ $oferta->descripcion }}</td>
									<td>{{ $oferta->ubicacion }}</td>
									<td>{{ $carrera[ $oferta->carrera ] }}</td>
									<td>$ {{ $oferta->salario }}.00 MXN</td>
									<td>{{ $oferta->status }}</td>
								</tr>
							@endforeach
						</tbody>
					</table>
					<!-- Paginación -->
					<div class="div-5"><!--div-5-->
						{{ $ofertas->appends( $_GET )->links() }}
					</div><!--div-5-->
				</div><!--div-4-->
			@else
				<p>No se encontraron ofertas laborales para esta empresa</p>
			@endif
		</div><!--contenedor-->
	</div>	
</div>
@stop
