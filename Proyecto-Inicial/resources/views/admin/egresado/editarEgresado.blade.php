@extends('admin.layouts.master')

@section('title', 'Editar egresados')

@section('style')

<link href="{{ url('css/ranking.css') }}" rel="stylesheet">
@stop
@section('content')
	<div class="contenedor"><!-- contenedor -->
		<div class="div-1">
			<p class="text-center">Editar egresado</p>
		</div><!--div-1-->
		@php
			//creamos arreglos asociativos para los select
			$nacionalidad = array(1=>'Mexicana', 2=>'Otra');
			$genero = array(1=>'Masculino', 2=>'Femenino');
			$carrera = array(0=>'Ingeniería en Diseño',1=>'Ingeniería en Computación',2=>'Ingeniría en Alimentos',3=>'Ingeniería en Electrónica',4=>'Ingeniería en Mecatrónica',5=>'Ingeniería Industrial',6=>'Ingeniería en Física Aplicada',7=>'Licenciatura en Ciencias Empresariales',8=>'Licenciatura en Matemáticas Aplicadas',9=>'Licenciatura en Estudios Mexicanos',10=>'Ingeniería en Mecánica Automotriz');
		@endphp

		<form method="post" action="{{route('admin.editarEgresado.submit')}}">
			{{ csrf_field() }}
			<input name="_token" type="hidden" value="{!! csrf_token() !!}" />
			
			<label for="" class="">Matricula: </label>
	 		<input type="text" name="matricula" value="{{$egresado->matricula}}" placeholder=""/>

	 		<label for="" class="">Nombre: </label>
	 		<input type="text" name="nombre" value="{{$egresado->nombre}}" placeholder=""/>

	 		<label for="" class="">Curp: </label>
	 		<input type="text" name="curp" value="{{$egresado->curp}}" placeholder=""/>

	 		<label for="" class="">Género: </label>
	 		<select name="genero">
	 			@foreach($genero as $idn=>$nombre)
					@if( $nombre == $egresado->genero)
	 					<option value={{$idn}} selected>{{$nombre}}</option><!--Tipo de datos enum-->
					@else
	 					<option value={{$idn}}>{{$nombre}}</option>
					@endif
	 			@endforeach
	 		</select>

	 		<label for="" class="">Fecha de nacimiento: </label>
	 		<input type="date" name="fecha_nacimiento" value="{{$egresado->fecha_nacimiento}}" placeholder="" />

	 		<label for="" class="">Nacionalidad: </label>
	 		<select name="nacionalidad">
	 			@foreach($nacionalidad as $idn=>$nombre)
					@if( $nombre == $egresado->nacionalidad)
	 					<option value={{$idn}} selected>{{$nombre}}</option><!--Tipo de datos enum-->
					@else
	 					<option value={{$idn}}>{{$nombre}}</option>
					@endif
	 			@endforeach
	 		</select>

	 		<label for="" class="">Lugar de origen: </label>
	 		<input type="text" name="lugar_origen" value="{{$egresado->lugar_origen}}" placeholder=""/>
	 		
	 		<input type="hidden" name="habilitado" value="1" placeholder=""/>

	 		<!--Datos de preparacion-->
	 		<label for="" class="">Carrera: </label>
	 		<select name="carrera">
	 			@foreach($carrera as $idn=>$nombre)
					@if( $idn == $preparacion->carrera)
	 					<option value={{$idn}} selected>{{$nombre}}</option><!--Tipo de datos enum-->
					@else
	 					<option value={{$idn}}>{{$nombre}}</option>
					@endif
	 			@endforeach
	 		</select>

	 		<label for="" class="">Generación: </label>
	 		<input type="text" name="generacion" value="{{$preparacion->generacion}}" placeholder=""/>

	 		<label for="" class="">Fecha de inicio de estudios: </label>
	 		<input type="date" name="fecha_inicio" value="{{$preparacion->fecha_inicio}}" />

	 		<label for="" class="">Fecha de fin de estudios: </label>
	 		<input type="date" name="fecha_fin" value="{{$preparacion->fecha_fin}}"/>

	 		<label for="" class="">Promedio: </label>
	 		<input type="text" name="promedio" value="{{$preparacion->promedio}}" placeholder=""/>

	 		<button type="submit" class="flat">Enviar</button>
		</form>		

	</div><!--contenedor-->

@stop