@extends('layouts.master')

@section('title', 'Comentarios')

@section('style')
	<link href="{{ url('css/datosEmpresa.css') }}" rel="stylesheet">	
	<link href="{{ url('css/ofertas.css') }}" rel="stylesheet">
	<link href="{{ url('css/paginacion.css') }}" rel="stylesheet">
@stop

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
				@if( $comentario->total > 0 )
					<center>
						<div>{{ $comentario->empresa->nombre }}</div>
						<div>
						<h2>{{ round( $comentario->promedio ) }}</h2>
							@for( $i = 1; $i <= 5; $i++ )
								@if( $i <= round( $comentario->promedio ) )
									<img src="{{ url('assets/images/empresa_estrella_full.png') }}">
								@else
									<img src="{{ url('assets/images/empresa_estrella_empty.png') }}">
								@endif
							@endfor
							<h6>{{ $comentario->total }} evaluaciones</h6>
						</div>
					</center>

					@foreach( $ranking as $rank )
						<div class="comentario_list">
							@for( $i = 1; $i <= 5; $i++ )
								@if( $i <=  round( $rank->calificacion ) )
									<img src="{{ url('assets/images/empresa_estrella_full.png') }}">
								@else
									<img src="{{ url('assets/images/empresa_estrella_empty.png') }}">
								@endif
							@endfor
							<label class="fecha_comentario">{{ $rank->created_at->diffForHumans() }}</label>
							<div>{{ $rank->comentario }}</div>
						</div>
					@endforeach

					<!-- Paginación -->
					<div class="div-5"><!--div-5-->
						{{ $ranking->appends( $_GET )->links() }}
					</div><!--div-5-->
				@else
					<p>No se encontraron resultados para esta empresa</p>
				@endif
			</div>	
		</div>
	</div>
@stop