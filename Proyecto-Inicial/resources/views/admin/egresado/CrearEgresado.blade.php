@extends('admin.layouts.master')

@section('title', 'Alta egresados')

@section('style')
	<link href="{{ url('css/cssadmin/altaEgresado.css') }}" rel="stylesheet">
@stop

@section('content')
	<div class="contenedor"><!-- contenedor -->
		<div class="div-1">
			<p class="text-center">Alta egresado</p>
		</div><!--div-1-->
		@php
			$nacionalidad = array(1=>'Mexicana', 2=>'Otra');

			$genero = array(1=>'Masculino', 2=>'Femenino');

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
				10=>'Ingeniería en Mecánica Automotriz');
		@endphp

		<form method="POST" enctype="multipart/form-data" action="{{ route('admin.crearEgresado.submit') }}">
			{{ csrf_field() }}
			<input name="_token" type="hidden" value="{!! csrf_token() !!}" />

			<div class="seccion1">
			<label for="" class="">Matricula: </label>
	 		<input type="text" name="matricula" placeholder="Ingrese la matricula" required/>

	 		<label for="" class="">Nombre(s): </label>
	 		<input class="nombre" type="text" name="nombres" placeholder="Ingrese nombre del egresado" required/>

			<div class="columnitas">
				<div>
	 				<label for="" class="">Apellido paterno: </label>
	 				<input type="text" name="ap_pa" placeholder="Apellido del paterno" required/>
				</div>

				<div>
	 				<label for="" class="">Apellido materno: </label>
	 				<input type="text" name="ap_ma" placeholder="Apellido del materno" required/>
				</div>
			</div>

			<div class="columnitas">
				<div>
	 				<label for="" class="">Curp: </label>
	 				<input type="text" name="curp" placeholder="Ingrese curp del egresado" required/>
				</div>

				<div>
	 				<label for="" class="">Género: </label>
	 				<select name="genero" class="genero">
	 					@foreach($genero as $idn=>$nombre)
	 						<option value={{$idn}}>{{$nombre}}</option><!--Tipo de datos enum-->
	 					@endforeach
	 				</select>
				</div>
			</div>

			<div class="columnitas">
				<div>
	 				<label for="" class="">Fecha de nacimiento: </label>
	 				<input type="date" name="fecha_nacimiento" required/>
				</div>

				<div>
	 				<label for="" class="">Nacionalidad: </label>
	 				<select name="nacionalidad">
	 					<@foreach($nacionalidad as $idn=>$nombre)
	 						<option value={{$idn}}>{{$nombre}}</option><!--Tipo de datos enum-->
	 					@endforeach
	 				</select>
				</div>
			</div>

	 		<label for="" class="">Lugar de origen: </label>
	 		<input type="text" name="lugar_origen" placeholder="Lugar de origen" required/>
	 		<input type="hidden" name="habilitado" value="1" placeholder=""/>
		</div>

		<div class="seccion2">
	 		<!--Datos de preparacion-->
	 		<label for="" class="">Carrera: </label>
	 		
			 <select name="carrera" class="carrera" required>
	 			@foreach($carrera as $idn=>$nombre)
	 					<option value="{{$idn}}">{{$nombre}}</option><!--Tipo de datos enum-->
	 			@endforeach
	 		</select>

	 		<label for="" class="">Generación: </label>
	 		<input type="text" name="generacion" placeholder="Ejemplo: 2013-2018" required/>

	 		<label for="" class="">Fecha de inicio de estudios: </label>
	 		<input type="date" name="fecha_inicio" required/>

	 		<label for="" class="">Fecha de fin de estudios: </label>
	 		<input type="date" name="fecha_fin" required/>

	 		<label for="" class="promedio">Promedio: </label>
	 		<input class="promedio" type="text" name="promedio" placeholder="Promedio" required/>

			<div class="boton">
	 			<button for="submit" type="submit" class="flat">Guardar</button>
			</div>
		</form>
	</div>
	</div><!--contenedor-->

@stop
