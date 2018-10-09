@extends('admin.layouts.master')

@section('title', 'Editar oferta')

@section('style')
	<!-- <link href="{{ url('css/ranking.css') }}" rel="stylesheet"> -->
	<link href="{{ url('css/cssadmin/editarOferta.css') }}" rel="stylesheet">
@stop

@section('script')
	<script src="{{ url('js/admin/evento.js') }}"></script>
@stop

@php
	$status = array(
		0=>'Vacante',
		1=>'Ocupada',
		2=>'Cancelada'
	);

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
	<div class="contenedor"><!-- contenedor -->
		<div class="div-1">
			<p class="text-center">Editar oferta</p>
		</div><!--div-1-->

		<!--Contenido de la pagina-->
		<form method="post" enctype="multipart/form-data" action="{{route('admin.editarOferta.submit')}}">
			{{ csrf_field() }}
		<div class="seccion1">
			<input name="_token" type="hidden" value="{!! csrf_token() !!}" />

			<input name="id" type="hidden" value="{{$oferta->id}}" />

			<label for="" class="">Título del empleo: </label>
	 		<input type="text" name="titulo_empleo" value="{{ $oferta->titulo_empleo }}" placeholder="Titulo de empleo" required/>

			<label for="" class="">Descripción: </label>
	 		<input type="text" name="descripcion" value="{{ $oferta->descripcion }}" placeholder="Descripción del puesto" required/>

	 		<label for="" class="">Carrera: </label>
	 		<select name="carrera" required>
			 	<!--Valor original del campo-->
			 	<option value="{{ $oferta->carrera }}">{{ $carrera[ $oferta->carrera ] }}</option>
				<!-- Evitar repetir el valor anterior -->
				@foreach($carrera as $idn=>$nombre)
	 				@if( $idn != $oferta->carrera )
						<option value = "{{ $idn }}">{{ $nombre }}</option>
					@endif
	 			@endforeach
	 		</select>

			<label for="" class="">Ubicación: </label>
	 		<input type="text" name="ubicacion" value="{{ $oferta->ubicacion }}" placeholder="Ubicación" required/>
	 	</div>
	 	<div class="seccion2">
			<label for="" class="">Experiencia: </label>
	 		<input type="text" name="experiencia" value="{{ $oferta->experiencia }}" placeholder="Experiencia requerida" required/>

			<label for="" class="">Salario: </label>
	 		<input type="text" name="salario" value="{{ $oferta->salario }}" placeholder="Salario" required/>

			<label for="" class="">Status: </label>
	 		<select name="status" required>
				<option value = "{{ $oferta->status }}">{{ $oferta->status }}</option>
				<@foreach( $status as $sts )
					@if( $sts != $oferta->status )
						<option value = "{{ $sts }}">{{ $sts }}</option>
					@endif
	 			@endforeach
	 		</select>

	 		<label for="" class="">Empresa: </label>
	 		<select name="empresa_id" required>
			 	<!-- Empresa original de la oferta -->
			 	<@foreach( $empresas as $empresa )
					@if( $oferta->empresa_id == $empresa->id )
						<option value = "{{ $empresa->id }}">{{ $empresa->nombre }}</option>
					@endif
	 			@endforeach
				<!-- Evitar repetir la empresa anterior -->
				<@foreach( $empresas as $empresa )
					@if( $oferta->empresa_id != $empresa->id )
						{{ $id = $empresa->id }}
	 					<option value={{$id}}>{{$empresa->nombre}}</option>
					@endif
	 			@endforeach
	 		</select>

			<div class="boton">
		 		<button type="submit" class="flat">
					Actualizar
				</button>
			</div>
		</div>
		</form>

	</div><!--contenedor-->

@stop
