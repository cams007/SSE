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
		@php
			//creamos arreglos asociativos para los select
			$nacionalidad = array(1=>'Mexicana', 2=>'Otra');
			
			$genero = array(1=>'Masculino', 2=>'Femenino');

			$carrera = array(0=>'Ingeniería en Diseño',1=>'Ingeniería en Computación',2=>'Ingeniría en Alimentos',3=>'Ingeniería en Electrónica',4=>'Ingeniería en Mecatrónica',5=>'Ingeniería Industrial',6=>'Ingeniería en Física Aplicada',7=>'Licenciatura en Ciencias Empresariales',8=>'Licenciatura en Matemáticas Aplicadas',9=>'Licenciatura en Estudios Mexicanos',10=>'Ingeniería en Mecánica Automotriz');
		@endphp

		<form method="POST" enctype="multipart/form-data" action="{{ route('admin.crearEgresado.submit') }}">
			{{ csrf_field() }}
			<input name="_token" type="hidden" value="{!! csrf_token() !!}" />
			
			<img src="{{ url('assets/images/crear.png') }}" alt="">
			<label for="" class="">Matricula: </label>
	 		<input type="text" name="matricula" placeholder="" required/>
			
			<img src="{{ url('assets/images/crear.png') }}" alt="">
	 		<label for="" class="">Apellido paterno: </label>
	 		<input type="text" name="ap_pa" placeholder="" required/>
			
			<img src="{{ url('assets/images/crear.png') }}" alt="">
	 		<label for="" class="">Apellido materno: </label>
	 		<input type="text" name="ap_ma" placeholder="" required/>
			
			<img src="{{ url('assets/images/crear.png') }}" alt="">
	 		<label for="" class="">Nombre(s): </label>
	 		<input type="text" name="nombres" placeholder="" required/>
			
			<img src="{{ url('assets/images/crear.png') }}" alt="">
	 		<label for="" class="">Curp: </label>
	 		<input type="text" name="curp" placeholder="" required/>
			
			<img src="{{ url('assets/images/crear.png') }}" alt="">
	 		<label for="" class="">Género: </label>
	 		<select name="genero">
	 			@foreach($genero as $idn=>$nombre)
	 					<option value={{$idn}}>{{$nombre}}</option><!--Tipo de datos enum-->
	 			@endforeach
	 		</select>
			
			<img src="{{ url('assets/images/crear.png') }}" alt="">
	 		<label for="" class="">Fecha de nacimiento: </label>
	 		<input type="date" name="fecha_nacimiento" placeholder="" required/>
			
			<img src="{{ url('assets/images/crear.png') }}" alt="">
	 		<label for="" class="">Nacionalidad: </label>
	 		<select name="nacionalidad">
	 			<@foreach($nacionalidad as $idn=>$nombre)
	 					<option value={{$idn}}>{{$nombre}}</option><!--Tipo de datos enum-->
	 			@endforeach
	 		</select>
			
			<img src="{{ url('assets/images/crear.png') }}" alt="">
	 		<label for="" class="">Lugar de origen: </label>
	 		<input type="text" name="lugar_origen" placeholder="" required/>
	 		
	 		<input type="hidden" name="habilitado" value="1" placeholder=""/>

	 		<!--Datos de preparacion-->
	 		<img src="{{ url('assets/images/crear.png') }}" alt="">
	 		<label for="" class="">Carrera: </label>
	 		<select name="carrera" required>
	 			@foreach($carrera as $idn=>$nombre)
	 					<option value="{{$idn}}">{{$nombre}}</option><!--Tipo de datos enum-->
	 			@endforeach
	 		</select>
			
			<img src="{{ url('assets/images/crear.png') }}" alt="">
	 		<label for="" class="">Generación: </label>
	 		<input type="text" name="generacion" placeholder="" required/>
			
			<img src="{{ url('assets/images/crear.png') }}" alt="">
	 		<label for="" class="">Fecha de inicio de estudios: </label>
	 		<input type="date" name="fecha_inicio" required/>
			
			<img src="{{ url('assets/images/crear.png') }}" alt="">
	 		<label for="" class="">Fecha de fin de estudios: </label>
	 		<input type="date" name="fecha_fin" required/>
			
			<img src="{{ url('assets/images/crear.png') }}" alt="">
	 		<label for="" class="">Promedio: </label>
	 		<input type="text" name="promedio" placeholder="" required/>
	 		
	 		<button type="submit" class="flat">Enviar</button>
		</form>	

	</div><!--contenedor-->

@stop