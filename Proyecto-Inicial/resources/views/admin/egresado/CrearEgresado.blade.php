@extends('Admin.layouts.master')

@section('title', 'Alta egresados')

@section('style')

<link href="{{ url('css/ranking.css') }}" rel="stylesheet">
@stop
@section('content')
	<div class="contenedor"><!-- contenedor -->
		<div class="div-1">
			<p class="text-center">Alta egresado</p>

		</div><!--div-1-->

		<form method="POST" enctype="multipart/form-data" action="{{ route('admin.crearEgresado.submit') }}">
			{{ csrf_field() }}
			<input name="_token" type="hidden" value="{!! csrf_token() !!}" />
			
			<label for="" class="">Matricula: </label>
	 		<input type="text" name="matricula" placeholder="ejemplo:201203956"/>

	 		<label for="" class="">Nombre: </label>
	 		<input type="text" name="nombre" placeholder=""/>

	 		<label for="" class="">Curp: </label>
	 		<input type="text" name="curp" placeholder=""/>

	 		<label for="" class="">Género: </label>
	 		<select name="genero">
	 			<option value="1">Masculino</option><!--Tipo de datos enum-->
	 			<option value="2">Femenino</option>
	 		</select>

	 		<label for="" class="">Fecha de nacimiento: </label>
	 		<input type="date" name="fecha_nacimiento" placeholder="" />

	 		<label for="" class="">Nacionalidad: </label>
	 		<select name="nacionalidad">
	 			<option value="1">Mexicana</option><!--Tipo de datos enum-->
	 			<option value="2">Otra</option>
	 		</select>

	 		<label for="" class="">Lugar de origen: </label>
	 		<input type="text" name="lugar_origen" placeholder=""/>

	 		<label for="" class="">Foto: </label>
	 		<input type="file" name="imagen"/>
	 		
	 		<input type="hidden" name="habilitado" value="1" placeholder=""/>

	 		<!--Datos de preparacion-->
	 		<label for="" class="">Carrera: </label>
	 		<select name="carrera">
	 			<option value="1">Computación</option><!--claves de carreras-->
	 			<option value="2">Diseño</option>
	 			<option value="3">Electronica</option>
	 			<option value="4">Mecatronica</option>
	 		</select>

	 		<label for="" class="">Generación: </label>
	 		<input type="text" name="generacion" placeholder=""/>

	 		<label for="" class="">Fecha de inicio de estudios: </label>
	 		<input type="date" name="fecha_inicio"/>

	 		<label for="" class="">Fecha de fin de estudios: </label>
	 		<input type="date" name="fecha_fin"/>

	 		<label for="" class="">Promedio: </label>
	 		<input type="text" name="promedio" placeholder=""/>

	 		<button type="submit" class="flat">
						Enviar
			</button>
		</form>	

	</div><!--contenedor-->

@stop