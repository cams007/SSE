@extends('layouts.master')

@section('title', 'Datos básicos')

@section('style')
	<link href="{{ url('css/datosEmpresa.css') }}" rel="stylesheet">	
	<link href="{{ url('css/modalDatosEmpresa.css') }}" rel="stylesheet">
	<link href="{{ url('css/estrellasRating.css') }}" rel="stylesheet">
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
@stop

@section('script')
	<script src="{{ url('js/calificar.js') }}"></script>
@stop

@section('content')
	<div class="contenedor"><!--inicio contenedor-->
		<div class="div-1"> <!--incio div-1-->
				<p class="text-center">Datos de empresa</p>
		</div><!--fin div-1-->
		<div class="div-2"><!--inicio div-2-->
			<div class="div-2-1"><!--inicio div-2-1-->
				<aside id="cssmenu" class="column hrV">
					@include('partials.asideEmpresa')
				</aside>
			</div><!--fin div-2-1-->

			<div class="div-2-2"><!--inicio div-2-2-->
				<div class="column content-sm">
					<div>
						{{ csrf_field() }}

						<div class="contenedor-info"><!--inicio contenedor-info-->
							<div class="icono"><!--inicio icono-->
								<img src="{{ url('assets/images/address.png') }}" alt="" class="iconos">
							</div><!--fin icono-->
							<div class="info"><!--inicio info-->
								<span> {{ $empresa->nombre }} </span>
							</div><!--info-->
						</div><!--contenedor-info-->
						
						<div class="contenedor-info"><!--inicio contenedor-info-->
							<div class="icono"><!--inicio icono-->
								<img src="{{ url('assets/images/home0.png') }}" alt="" class="iconos">
							</div><!--fin icono-->
							<div class="info"><!--inicio info-->
								<span> {{ $empresa->ciudad}}, {{ $empresa->ciudad }} </span>
							</div><!--info-->
						</div><!--contenedor-info-->

						<div class="contenedor-info"><!--inicio contenedor-info-->
							<div class="icono"><!--inicio icono-->
								<img src="{{ url('assets/images/phone.png') }}" alt="" class="iconos">
							</div><!--fin icono-->
							<div class="info"><!--inicio info-->
								<span> {{ $empresa->telefono }} </span>
							</div><!--info-->
						</div><!--contenedor-info-->

						<div class="contenedor-info"><!--inicio contenedor-info-->
							<div class="icono"><!--inicio icono-->
								<img src="{{ url('assets/images/email.png') }}" alt="" class="iconos">
							</div><!--fin icono-->
							<div class="info"><!--inicio info-->
								<span> {{ $empresa->correo }} </span>
							</div><!--info-->
						</div><!--contenedor-info-->

						<div class="contenedor-info"><!--inicio contenedor-info-->
							<div class="icono"><!--inicio icono-->
								<img src="{{ url('assets/images/user0.png') }}" alt="" class="iconos">
							</div><!--fin icono-->
							<div class="info"><!--inicio info-->
								<span> {{ $empresa->contacto->nombre }} </span>
							</div><!--info-->
						</div><!--contenedor-info-->

						<div class="contenedor-info"><!--inicio contenedor-info-->
							<div class="icono"><!--inicio icono-->
								<img src="{{ url('assets/images/empresa_puesto.png') }}" alt="" class="iconos">
							</div><!--fin icono-->
							<div class="info"><!--inicio info-->
								<span> {{ $empresa->contacto->puesto }} </span>
							</div><!--info-->
						</div><!--contenedor-info-->

					</div>
				</div>
			</div><!--fin div-2-2-->

			<div class="column column2"> <!-- div-2-3 -->
			<img src="{{url( $empresa->imagen_url )}}" alt="user-picture" class="img-thumbnail img">
				@if( $rank == 0 )
					<div class="calificacion">
						<img src="{{ url('assets/images/empresa_estrella.png') }}" alt="" class="iconos">
						<a href="#calificaEmpresa">Calificar empresa</a>
					</div>
				@endif
			</div><!--fin div-2-3-->

		</div><!--fin div-2-->
	</div><!--fin contenedor-->

	<div id="calificaEmpresa" class="modaloverlay">
	  	<div class="modal">
		    	<a href="#close" class="close">&times;</a>
			<div>
				<p class="txt">Calificar esta empresa</p>
				<div class = "stars">
					<form method="POST" enctype="multipart/form-data" action="{{ route('guardarCalificacion.submit') }}">
						{{ csrf_field() }}

						<div class="descripcion" id="id">
							<!-- {{$request->id}} -->
							<input type="hidden" name = "id" value='{{$request->id}}'/>
						</div>

						<input class="star star-5" id="star_5" type="radio" name = "star" value = "5"/>
						<label class="star star-5" for="star_5"></label>
						<input class="star star-4" id="star_4" type="radio" name = "star" value = "4"/>
						<label class="star star-4" for="star_4"></label>
						<input class="star star-3" id="star_3" type="radio" name = "star" value = "3"/>
						<label class="star star-3" for="star_3"></label>
						<input class="star star-2" id="star_2" type="radio" name = "star" value = "2"/>
						<label class="star star-2" for="star_2"></label>
						<input class="star star-1" id="star_1" type="radio" name = "star" value = "1"/>
						<label class="star star-1" for="star_1"></label>
						
						<p class="coment">Comentario</p>
						<div>
							<textarea name="comentario" id="comentario" class="form-control" rows="3" required></textarea>
						</div>

						<div class="btn-group">
							<a href="#close"><button type="button" class="flat-secundario">Cancelar</button></a>
							<button type="submit" class="flat aling-right">Guardar</button>
						</div>
					</form>
				<div>
		    	</div>
		</div>
	</div>
@stop
