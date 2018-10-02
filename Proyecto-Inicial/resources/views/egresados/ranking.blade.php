@extends('layouts.master')

@section('title', 'Ranking de empresas')

@section('style')
	<link href="{{ url('css/ranking.css') }}" rel="stylesheet">
	<link href="{{ url('css/paginacion.css') }}" rel="stylesheet">
@stop

@section('script')
	<script src="{{ url('js/ranking.js') }}"></script>
@stop

@section('content')
<div class="contenedor"><!-- contenedor -->
	<div class="div-1">
		<p class="text-center">Ranking de empresas</p>
	</div><!--div-1-->
	
		<div class="search">
			{!! Form::open(['url' => 'ranking', 'method' => 'GET', 'role' => 'search']) !!}
				{!! Form::text('q', null, ['type' => 'search', 'name' => 'q', 'placeholder' => 'Buscar']) !!}
			{!! Form::close() !!}
		</div>		
		
	<div class="se-encontraron">
		<p>Se encontraron {{ $empresas->total() }} resultados</p>
	</div>
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
						<tr data-empresa="{{ $empresa }}" data-contacto="{{ $empresa->contacto }}">
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
							<!--	{{ round( $empresa->calif ) }} -->
								@for( $i = 1; $i <= 5; $i++ )
									@if( $i <=  round( $empresa->calif ) )
										<img src="{{ url('assets/images/empresa_estrella_full.png') }}">
									@else
										<img src="{{ url('assets/images/empresa_estrella_empty.png') }}">
									@endif
								@endfor
							</td>
							<td><a href="#datosEmpresa" class="btn-empresa">{{ $empresa->nombre }}</a></td>
							<td>{{ $empresa->ciudad . ', ' . $empresa->estado }}</td>
							<td>{{ $empresa->giro }}</td>
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
				<p class="txt">Datos de la empresa</p>			
		    	<form action="#">
			    	<div class="item-1"><!--item-1-->
						<div class="icono"><!--icono-->
							<img src="{{ url('assets/images/address.png') }}" alt="" class="iconos">
						</div><!--icono-->
						<div class="descripcion" id="e_nombre"></div>
					</div><!--item-1-->

					<div class="item-1"><!--item-1-->
						<div class="icono"><!--icono-->
							<img src="{{ url('assets/images/home0.png') }}" alt="" class="iconos">
						</div><!--icono-->
						<div class="descripcion" id="e_direccion"></div>
					</div><!--item-1-->

					<div class="item-1"><!--item-1-->
						<div class="icono"><!--icono-->
							<img src="{{ url('assets/images/phone.png') }}" alt="" class="iconos">
						</div><!--icono-->
						<div class="descripcion" id="e_telefono"></div>
					</div><!--item-1-->

					<div class="item-1"><!--item-1-->
						<div class="icono"><!--icono-->
							<img src="{{ url('assets/images/email.png') }}" alt="" class="iconos">
						</div><!--icono-->
						<div class="descripcion" id="e_correo"></div><!--descripcion-->
					</div><!--item-1-->

					<div class="item-1"><!--item-1-->
						<div class="icono"><!--icono-->
							<img src="{{ url('assets/images/user0.png') }}" alt="" class="iconos">
						</div><!--icono-->
						<div class="descripcion" id="e_contacto"></div><!--descripcion-->
					</div><!--item-1-->

					<div class="item-1"><!--item-1-->
						<div class="icono"><!--icono-->
							<img src="{{ url('assets/images/empresa_puesto.png') }}" alt="" class="iconos">
						</div><!--icono-->
						<div class="descripcion" id="e_puesto"></div><!--descripcion-->
					</div><!--item-1-->

					<div class="btn-group">
						<a href="#close"><button type="button" class="flat-secundario">Cerrar</button></a>
					</div>
		    	</form>
		</div>
	</div>
@stop
