@extends('layouts.master')

@section('title', 'Ranking de empresas')

@section('style')
<link href="{{ url('css/ranking.css') }}" rel="stylesheet">
<link href="{{ url('css/paginacion.css') }}" rel="stylesheet">
@stop

@section('content')
<div class="contenedor"><!-- contenedor -->
	<div class="div-1">
		<p class="text-center">Ranking de empresas</p>
	</div><!--div-1-->

	<div class="div-2"><!--div-2-->
		<div class="div-2-1"><!--div-2-1-->
			<p class="titulo_select">Calificación:</p>
		</div><!--div-2-1-->

		<div class="div-2-2"><!--div-2-3-->
			<div class="search">
				{!! Form::open(['url' => 'ranking', 'method' => 'GET', 'role' => 'search']) !!}
					{!! Form::text('q', null, ['type' => 'search', 'name' => 'q', 'placeholder' => 'Buscar']) !!}
				{!! Form::close() !!}
			</div>
		</div><!--div-2-3-->
	</div><!--div-2-->

	<div class="div-3"><!--div-3-->
		<!-- Filtros -->
		<div class="div-3-1"><!--div-3-1-->
			<select name="Calificacion" class="seleccion">
				<option selected="">Todas</option>
				<option value="saab">Menor a 2.5</option>
				<option value="saab">Mayor o igual a 2.5</option>
			</select>
		</div><!--div-3-1-->
	</div><!--div-3-->

	<div class="div-4"><!--div-4-->
		<div class="div-4-1"><!--div-4-1-->
			<table>
				<thead>
					<tr>
						<th>Lugar</th>
						<th>Calificación</th>
						<th>Nombre de la empresa</th>
						<th>Ubicación</th>
						<th>Giro de la empresa</th>
					</tr>
				</thead>
				<tbody>
					@foreach($empresas as $indexKey => $empresa)
						<tr>
							@if ( Request::get('page') )
								@if ( Request::get('page') == 1 and $indexKey == 0 )
									<td><img src="{{ url('assets/images/trofeo.png') }}"></td> 
								@else							
									<td class="text_red"> {{ ($indexKey + 1) + ((Request::get('page')-1) * 10) }} </td>
								@endif
							@elseif ( $indexKey == 0 )
								<td><img src="{{ url('assets/images/trofeo.png') }}"></td> 
							@else
								<td class="text_red">{{ $indexKey + 1 }}</td>
							@endif

							<!-- <td class="text_red">{{ $indexKey + 1 }}</td> -->
							<td>
								{{ $empresa->calif }}
								<img src="{{ url('assets/images/empresa_estrella_full.png') }}">
								<img src="{{ url('assets/images/empresa_estrella_full.png') }}">
								<img src="{{ url('assets/images/empresa_estrella_full.png') }}">
								<img src="{{ url('assets/images/empresa_estrella_full.png') }}">
								<img src="{{ url('assets/images/empresa_estrella_empty.png') }}">
							</td>
							<td><a href="#datosEmpresa">{{ $empresa->nombre }}</a></td>
							<td>{{ $empresa->ciudad . ', ' . $empresa->estado }}</td>
							<td>Consultoría</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div><!--div-4-1-->
	</div><!--div-4-->
	<div class="div-5"><!--div-5-->
		<!-- Paginación -->
		<div class="paginate">
			@if ( Request::get('q') )
				{!! $empresas->appends(['q' => $_GET["q"]])->render() !!}
			@else
				{!! $empresas->render() !!}
			@endif
		</div>

	</div><!--div-5-->
</div><!--contenedor-->

	<div id="datosEmpresa" class="modaloverlay">
	  	<div class="modal">
		    <a href="#close" class="close">&times;</a>
		    <div>
		    	<h1>Datos de empresa</h1>
		    	<form action="#">
			    	<div>
						<img src="{{ url('assets/images/address.png') }}" alt="" class="iconos">
						<span> {{" Apple Inc. "}} </span>
					</div>

					<div>
						<img src="{{ url('assets/images/home0.png') }}" alt="" class="iconos">
						<span> {{" Cupertino, California, Estados Unidos "}} </span>
					</div>

					<div>
						<img src="{{ url('assets/images/phone.png') }}" alt="" class="iconos">
						<span> {{" 1-800-275-2273 "}} </span>
					</div>

					<div>
						<img src="{{ url('assets/images/email.png') }}" alt="" class="iconos">
						<span> {{" info@apple.com "}} </span>
					</div>

					<div>
						<img src="{{ url('assets/images/user0.png') }}" alt="" class="iconos">
						<span> {{" Tim Cook "}} </span>
					</div>

					<div>
						<img src="{{ url('assets/images/empresa_puesto.png') }}" alt="" class="iconos">
						<span> {{" CEO "}} </span>
					</div>

					<div>
						<br><br>
						<h4>Calificar esta empresa</h4>
						<img src="{{ url('assets/images/empresa_estrella.png') }}" alt="" class="iconos">
						<img src="{{ url('assets/images/empresa_estrella.png') }}" alt="" class="iconos">
						<img src="{{ url('assets/images/empresa_estrella.png') }}" alt="" class="iconos">
						<img src="{{ url('assets/images/empresa_estrella.png') }}" alt="" class="iconos">
						<img src="{{ url('assets/images/empresa_estrella.png') }}" alt="" class="iconos">
					</div>
					<div>
						<textarea name="" id="comentario" class="form-control" rows="3"></textarea>
					</div>

					<div class="btn-group">
						<!-- <button type="button" class="flat-secundario">Cancelar</button> -->
						<button type="button" class="flat aling-right">Guardar</button>
					</div>
		    	</form>
		    </div>
		</div>
	</div>

@stop
