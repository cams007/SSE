@extends('layouts.master')

@section('title', 'Eventos UTM')

@section('style')
	<link href="{{ url('css/eventosUTM.css') }}" rel="stylesheet">
	<link href="{{ url('css/paginacion.css') }}" rel="stylesheet">
	<link href="{{ url('css/modal.css') }}" rel="stylesheet">
	<!--<link href="{{ url('css/ofertas.css') }}" rel="stylesheet">-->
@stop

@section('script')
	<script src="{{ url('js/eventos.js') }}"></script>
@stop

@section('content')
<div class="contenedor"><!--inicio contenedor-->

	<div class="div-1"> <!--incio div-1-->
		<p class="text-center">Eventos UTM</p>
	</div><!--fin div-1-->

	<div class="div-2"><!--inicio div-2-->

		<div class="div-2-1"><!--inicio div-2-1-->
			<aside class="column" id="cssmenu">
				@include('partials.AsideEventosUtm')
			</aside>
		</div><!--fin div-2-1-->

	 	<div class="div-2-2"><!--inicio div-2-2-->

			<div class="div-2-2-1"> <!--inicio div-2-2-1-->
				<div class="buscar-eventos">
					{!! Form::open(['url' => url()->current(), 'method' => 'GET', 'role' => 'search']) !!}
						{!! Form::text('q', null, ['type' => 'search', 'name' => 'q', 'placeholder' => 'Buscador de eventos']) !!}
					{!! Form::close() !!}
				</div>
			</div><!--fin div-2-2-1-->
			<div class="se-encontraron">
				<p>Se encontraron {{ $eventos->total() }} eventos</p>
			</div>
		 	<div class="div-2-2-2"><!--inicio div-2-2-2-->
		 		<ul>
		 		@foreach($eventos as $evento)
					<li data-evento="{{ $evento }}">
						<div class="div-2-2-2-1"><!--inicio div2-2-2-1-->

							<div class="foto"><!--incio foto-->
								<a href="#detalleEvento" class="btn-evento"><img src="{{url($evento->imagen_url)}}" class="foto"></a>
							</div><!--fin foto-->

							<div class="descripcion-foto"><!--inicio descripcion-foto-->
								<div class="texto-descripcion"><!--inicio orquesta-div-1-->

										<a href="#detalleEvento" class="evento-nombre">{{ $evento->nombre }}</a>

									<!-- <p class="evento-nombre">{{ $evento->nombre }}</p> -->
								</div><!--fin orquesta-div-1-->

								<div class="contenedor-fecha"><!--inicio cotenedor-fecha-->
									<div class="icono-calendario"><!--inicio icono-calendario-->
										<img src="{{ url('assets/images/eventos_calendar.png') }}" alt="" class="iconos">
									</div><!--fin icono-calendario-->
									<div class="texto-fecha"><!--inicio ubicacion-->
										<p class="texto-fecha">{{ $evento->fecha }}</p>
									</div><!--fin texto-fecha-->
								</div><!--fin contenedor-fecha-->

								<div class="contenedor-ubicacion"><!--inicio contenedor-ubicacion-->
									<div class="icono-ubicacion"><!--inicio icono-ubicacion-->
										<img src="{{ url('assets/images/eventos_location.png') }}" alt="" class="iconos">
									</div><!--fin icono-ubicacion-->
									<div class="texto-ubicacion"><!--inicio texto-ubicacion-->
										<!-- <p class="texto-ubicacion">{{ $evento->lugar }}</p> -->
										{{ $evento->lugar }}
									</div><!--fin texto-ubicacion-->
								</div><!--fin contenedor-ubicacion-->

								<!-- La asistencia no esta considerada en la Base de Datos
								<div class="asistiras">
									<div class="texto-asistiras">
										<p>¿Asistirás?</p>
									</div>
								</div>
								
								<div class="botones-si-no">
									<input type="button" class="si" value="Sí">
									<input type="button" class="no" value="No">
								</div>
								-->
							</div><!--fin descripcion-foto-->
						</div><!--fin div-2-2-2-1-->
					</li>
				@endforeach
				</ul>
			</div><!--fin div-2-2-2-->
			<div class="div-2-2-3"><!--inicio div-2-2-3-->
				<?php if (isset($_GET['q'])){ ?>
				{!! $eventos->appends(['q' => $_GET["q"]])->render() !!}
				<?php }else{ ?>
					{!! $eventos->render() !!}
				<?php } ?>
			</div><!--fin div-2-2-3-->
		</div><!--fin div-2-2-->
	 <!--</div>-->

	</div><!--fin div-2-->

</div><!--fin contenedor-->

<div id="detalleEvento" class="modaloverlay"> <!-- div-modaloverlay -->
	<div class="modal"> <!-- div-modal -->
		<a href="#close" class="close">&times;</a>
		<!-- <div> -->
		<div class="parte-1"><!--parte-1-->
			<h1 class="txt" id="e_titulo"><h1>
		</div><!--parte-1-->

			<div class="parte-2"><!--parte-2-->

				<div class="e_imagen" id = "e_imagen"><!--item-1--> </div><!--item-1-->

				<div class="item-1" id="e_descripcion"><!--item-1-->
				</div><!--item-1-->

				<div class="item-1"><!--item-1-->
					<div class="icono"><!--icono-->
						<img src="{{ url('assets/images/eventos_calendar.png') }}" alt="" class="iconos">
					</div><!--icono-->
					<div class="descripcion" id="e_fecha"></div><!--descripcion-->
				</div><!--item-1-->

				<div class="item-1"><!--item-1-->
					<div class="icono"><!--icono-->
						<img src="{{ url('assets/images/eventos_location.png') }}" alt="" class="iconos">
					</div><!--icono-->
					<div class="descripcion" id="e_lugar"></div><!--descripcion-->
				</div><!--item-1-->

			</div><!--parte-2-->

			<div class="parte-3"><!--parte-3-->
				<div class="btn-group">
					<a href="#close"><button class="flat" href="#close">Salir</button></a>
				</div>
			</div><!--parte-3-->
		</form>
		<!-- </div> -->
	</div> <!-- div-modal -->
</div> <!-- div-modaloverlay -->

@stop
