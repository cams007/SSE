@extends('layouts.master')

@section('title', 'Comentarios')

@section('style')
<link href="{{ url('css/perfil.css') }}" rel="stylesheet">
<link href="{{ url('css/ofertas.css') }}" rel="stylesheet">
<link href="{{ url('css/empresa.css') }}" rel="stylesheet">
<link href="{{ url('css/paginacion.css') }}" rel="stylesheet">
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
				@if( $comentario->total > 0 )
					<center>
						<div>{{ $comentario->empresa->nombre }}</div>
						<div>
						<h2>{{ $comentario->promedio }}</h2>
							@for( $i = 1; $i <= 5; $i++ )
								@if( $i <=  round( $comentario->promedio ) )
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
						@if ( Request::get('q') )
							{!! $ranking->appends(['q' => $_GET["q"]])->render() !!}
						@else
							{!! $ranking->render() !!}
						@endif
					</div><!--div-5-->
				@else
					<p>No se encontraron resultados para esta empresa</p>
				@endif
			</div>
		</div><!--contenedor-->
	</div>
@stop