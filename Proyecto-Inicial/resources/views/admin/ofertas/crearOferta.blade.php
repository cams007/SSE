@extends('admin.layouts.master')

@section('title', 'Crear oferta')

@section('style')

<!-- <link href="{{ url('css/ranking.css') }}" rel="stylesheet"> -->
	<link href="{{ url('css/cssadmin/crearOferta.css') }}" rel="stylesheet">
@stop

@php
	$status = array(
		1 => 'Vacante',
		2 => 'Ocupada',
		3 => 'Cancelada'
	);

	$carrera = array(
		0 => 'Ingeniería en Diseño',
		1 => 'Ingeniería en Computación',
		2 => 'Ingeniría en Alimentos',
		3 => 'Ingeniería en Electrónica',
		4 => 'Ingeniería en Mecatrónica',
		5 => 'Ingeniería Industrial',
		6 => 'Ingeniería en Física Aplicada',
		7 => 'Licenciatura en Ciencias Empresariales',
		8 => 'Licenciatura en Matemáticas Aplicadas',
		9 => 'Licenciatura en Estudios Mexicanos',
		10 => 'Ingeniería en Mecánica Automotriz'
	);
@endphp

@section('content')
	<div class="contenedor"><!-- contenedor -->
		<div class="div-1">
			<p class="text-center">Crear oferta</p>
		</div><!--div-1-->

		<form method="POST" enctype="multipart/form-data" action="{{ route('admin.crearOferta.submit') }}">
			{{ csrf_field() }}
		<div class="seccion1">
			<input name="_token" type="hidden" value="{!! csrf_token() !!}" />

			<label for="" class="">Nombre del empleo: </label>
	 		<input type="text" name="titulo_empleo" placeholder="Nombre del empleo" required/>

	 		<label for="" class="">Descripción: </label>
	 		<input type="text" name="descripcion" placeholder="Descripción" required/>

	 		<label for="" class="">Empresa: </label>
	 		<select name="empresa_id" required>
	 			@foreach( $empresas as $empresa )
				 		{{ $id = $empresa->id }}
	 					<option value={{$id}}>{{$empresa->nombre}}</option>
	 			@endforeach
	 		</select>

	 		<label for="" class="">Ubicación: </label>
	 		<input type="text" name="ubicacion" placeholder="Ubicación" required/>
		</div>
		<div class="seccion2">
			<!--Datos de preparacion-->
	 		<label for="" class="">Carrera: </label>
	 		<select name="carrera" required>
	 			@foreach( $carrera as $idn=>$nombre )
	 					<option value="{{$idn}}">{{$nombre}}</option>
	 			@endforeach
	 		</select>
	 		 	
	 		<label for="" class="">Experiencia: </label>
	 		<input type="text" name="experiencia" placeholder="Experiencia" required/>

	 		<label for="" class="">Salario: </label>
	 		<input type="text" name="salario" placeholder="Salario" required/>

	 		<label for="" class="">Status: </label>
	 		<select name="status" required>
	 			<@foreach($status as $idn=>$nombre)
	 					<option value={{$idn}}>{{$nombre}}</option>
	 			@endforeach
	 		</select>


			<div class="boton">
			 <button type="submit" class="flat">Guardar</button>
		 	</div>
		 </div>
		</form>

	</div><!--contenedor-->
@stop
