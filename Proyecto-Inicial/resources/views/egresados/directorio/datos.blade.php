@extends('layouts.master')

@section('title', 'Datos basicos')

@section('style')
<link href="{{ url('css/perfil.css') }}" rel="stylesheet">
<link href="{{ url('css/empresa.css') }}" rel="stylesheet">
<link href="{{ url('css/modal.css') }}" rel="stylesheet">
@stop

@section('content')
	<div class="contenedor"><!--inicio contenedor-->

		<div class="div-1"><!--inicio div-1-->
			<h1>Datos de empresa</h1>
		</div><!--fin div-1-->
		<div class="div-2"><!--inicio div-2-->
			<div class="div-2-1"><!--inicio div-2-1-->
				<aside id="cssmenu" class="column hrV">
					@include('partials.asideEmpresa')
				</aside>
			</div><!--fin div-2-1-->

			<div class="div-2-2"><!--inicio div-2-2-->
				<div class="column content-sm">
					<form method="POST" action="#">

						{{-- TODO: Protección contra CSRF --}}
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

					</form>
				</div>
			</div><!--fin div-2-2-->

			<div class="column"> <!-- div-2-3 -->
			<img src="{{url( $empresa->imagen_url )}}" alt="user-picture" class="img-thumbnail img">
				<div>
					<img src="{{ url('assets/images/empresa_estrella.png') }}" alt="" class="iconos">
					<a href="#calificaEmpresa">Calificar empresa</a>
				</div>
			</div><!--fin div-2-3-->

		</div><!--fin div-2-->
	</div><!--fin contenedor-->

	<div id="calificaEmpresa" class="modaloverlay">
	  	<div class="modal">
		    <a href="#close" class="close">&times;</a>
		    <div>

		    	<h1>Calificar esta empresa</h1>
			<!-- FALTA ESTAS-->
		    	<form action = "#">
			    	{{ csrf_field() }}
						
				<div class="descripcion" id="id">
					<!-- {{$request->id}} -->
					<input type="hidden" name="id" value='{{$request->id}}'/>
				</div>

				<div>
					<br><br>
					<img src="{{ url('assets/images/empresa_estrella.png') }}" alt="" class="iconos">
					<img src="{{ url('assets/images/empresa_estrella.png') }}" alt="" class="iconos">
					<img src="{{ url('assets/images/empresa_estrella.png') }}" alt="" class="iconos">
					<img src="{{ url('assets/images/empresa_estrella.png') }}" alt="" class="iconos">
					<img src="{{ url('assets/images/empresa_estrella.png') }}" alt="" class="iconos">
				</div>
				<p>Comentario</p>
				<div>
					<textarea name="" id="comentario" class="form-control" rows="3"></textarea>
				</div>

				<div class="btn-group">
					<button type="button" class="flat-secundario">Cancelar</button>
					<button type="button" class="flat aling-right">Guardar</button>
				</div>
		    	</form>
		    </div>
		</div>
	</div>
@stop

@section('script')
	<script src="{{ url('js/ofertas.js') }}"></script>
	<script type="text/javascript">
		var APP_URL = {!! json_encode(url('/calificar')) !!}
	</script>
@stop
