@extends('layouts.master')

@section('title', 'Ofertas laborales')

@section('style')
<link href="{{ url('css/ofertas.css') }}" rel="stylesheet">
<link href="{{ url('css/modal.css') }}" rel="stylesheet">
<link href="{{ url('css/table.css') }}" rel="stylesheet">
<link href="{{ url('css/paginacion.css') }}" rel="stylesheet">

<link href="{{ url('css/perfil.css') }}" rel="stylesheet">
<link href="{{ url('css/ofertas.css') }}" rel="stylesheet">
<link href="{{ url('css/empresa.css') }}" rel="stylesheet">
@stop

@section('content')

<h1>Datos de empresa</h1>
	<hr class="hr">
	<div class="clearfix">
		<aside id="cssmenu" class="column hrV">
			@include('partials.asideEmpresa')
		</aside>
		<div class="column content">
				<div class="contenedor"><!--contenedor-->
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
										<th>Salario</th>
										<th>Status</th>
									</tr>
								</thead>
								<tbody>
									@foreach($ofertas as $oferta)
										<tr>
											<td> {{ $oferta->titulo_empleo }} </td>
											<td>{{ $oferta->descripcion }}</td>
											<td>{{ $oferta->ubicacion }}</a></td>
											<td>{{ $oferta->salario }}</td>
											<td>{{ $oferta->status }}</td>
										<!-- </tr> -->
									@endforeach
								</tbody>
							</table>
						</div><!--div-4-->
						<!-- Paginación -->
						<div class="div-5"><!--div-5-->
							@if ( Request::get('q') )
								{!! $ofertas->appends(['q' => $_GET["q"]])->render() !!}
							@else
								{!! $ofertas->render() !!}
							@endif
						</div><!--div-5-->
					@else
						<p>No se encontraron ofertas laborales para esta empresa</p>
					@endif
				</div><!--contenedor-->
		</div>
	</div>



@stop
