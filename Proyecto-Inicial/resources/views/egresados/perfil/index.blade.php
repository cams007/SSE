@extends('layouts.master')

@section('title', 'Datos basicos')

@section('style')
<link href="{{ url('css/perfil.css') }}" rel="stylesheet">
@stop

@section('content')

<div class="contenedor"><!--inicio contenedor-->
	<div class="div-1"><!--inicio div-1-->
		<!-- <p>Mi Perfil</p> -->
		<h1>Mi Perfil</h1>
		<hr class="hr">
	</div><!--fin div-1-->

	<div class="div-2"><!--inicio div-2-->
		<div class="div-2-1"><!--inicio div-2-1-->
			<aside id="cssmenu" class="column hrV">
				@include('partials.aside')
			</aside>
		</div><!--fin div-2-1-->
		<div class="div-2-2"><!--inicio div-2-2-->
			<div class="column content">
				<form method="POST" action="{{url('perfil')}}">

					{{-- TODO: Protección contra CSRF --}}
					{{ csrf_field() }}

					<div class="contenedor-info"><!--inicio contenedor-info-->
						<div class="icono"><!--inicio icono-->
							<img src="{{ url('assets/images/user0.png') }}" alt="" class="iconos" title="Nombre">
						</div><!--fin icono-->
						<div class="info"><!--inicio info-->
							<span class="info-perfil"> {{ $egresados->nombres }} {{ $egresados->ap_paterno }} {{ $egresados->ap_materno }} </span>
						</div><!--info-->
					</div><!--contenedor-info-->
					<div class="contenedor-info"><!--inicio contenedor-info-->
						<div class="icono"><!--inicio icono-->
							<img src="{{ url('assets/images/birthday.png') }}" alt="" class="iconos" title="Fecha de nacimiento">
						</div><!--fin icono-->
						<div class="info"><!--inicio info-->
							<span class="info-perfil"> {{ $egresados->fecha_nacimiento }} </span>
						</div><!--info-->
					</div><!--contenedor-info-->

					<div class="contenedor-info"><!--inicio contenedor-info-->
						<div class="icono"><!--inicio icono-->
							<img src="{{ url('assets/images/address.png') }}" alt="" class="iconos" title="Lugar de origen">
						</div><!--fin icono-->
						<div class="info"><!--inicio info-->
							<span class="info-perfil"> {{ $egresados->lugar_origen }}</span>
						</div><!--info-->
					</div><!--contenedor-info-->

					<div>
						<input type="text" name="e_direccionActual" class="input-icon inputHome" placeholder="Agrega tu ciudad actual"  value="{{$egresados->direccion_actual}} " title="Dirección actual" />
					</div>

					<div>
						<input type="email" name="e_correo" class="input-icon inputEmail" placeholder="Agregar un correo electrónico" value="{{$egresados->usuario->correo}}" title="Correo electrónico" />
					</div>

					<div>
						<input type="tel" name="e_telefono" class="input-icon inputTel" placeholder="Agregar teléfono" value="{{$egresados->telefono}}" title="Teléfono" />
					</div>

					<div>
						<p>Género</p>
						{!! Form::select('e_genero', config('options.generos'), $egresados->genero, ['class' => 'select', 'required']) !!}
					</div>

					<div>
						<p>Nacionalidad</p>
						{!! Form::select('e_nacionalidad', config('options.nacionalidades'), $egresados->nacionalidad, ['class' => 'select', 'required', "onchange" => "changeNacionalidad(this.value)"]) !!}

						<input type="text" name="e_otraNacionalidad" id="otra_nacionalidad" class="input-icon inputTel" placeholder="Agregar nacionalidad" />
					</div>

					<div>
						<p>Curriculum vitae</p>
						<input type="file" name="e_cv">
					</div>

					<div class="text-center">
						<button type="submit" class="flat">
							Siguiente
						</button>
					</div>

				</form>
			</div>
		</div><!--fin div-2-2-->
		<div class="div-2-3">
			@if($egresados->imagen_url)
				<img src="{{url($egresados->imagen_url)}}" alt="user-picture" class="img-thumbnail img">
				<div>
	    		<a href="#">
	    			Cambiar foto de perfil
	    		</a>
	    	</div>
			@else
				<img src="{{url('assets/images/egresados/default.png')}}" alt="user-picture" class="img-thumbnail img">
				<div>
	    		<a href="#">
	    			Subir foto de perfil
	    		</a>
	    	</div>
			@endif
		</div><!--fin div-2-3-->
	</div><!--fin div-2-->
</div><!--fin contenedor-->

@stop

@section('script')
	<script src="{{ url('js/perfil.js') }}"></script>
@stop
