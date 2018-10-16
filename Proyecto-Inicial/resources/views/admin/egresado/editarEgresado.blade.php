@extends('admin.layouts.master')

@section('title', 'Editar egresados')

@section('style')

<!-- <link href="{{ url('css/ranking.css') }}" rel="stylesheet"> -->
<link href="{{ url('css/cssadmin/editarEgresado.css') }}" rel="stylesheet">
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

		<form method="post" action="{{route('admin.editarEgresado.submit')}}">
			{{ csrf_field() }}
			<input name="_token" type="hidden" value="{!! csrf_token() !!}" />
			
			<div class="seccion1">
				<label for="" class="">Matrícula: </label>
				<input type="text" name="matricula" value="{{$egresado->matricula}}" placeholder="Matrícula" required/>

				<label for="" class="">Nombre(s): </label>
				<input class="nombre" type="text" name="nombres" value="{{$egresado->nombres}}" placeholder="Nombre(s)" required/>

				<div class="columnitas">
					<div>
						<label for="" class="">Apellido paterno: </label>
						<input type="text" name="ap_pa" value="{{$egresado->ap_paterno}}" placeholder="Apellido paterno" required/>
					</div>

					<div>
						<label for="" class="">Apellido materno: </label>
						<input type="text" name="ap_ma" value="{{$egresado->ap_materno}}" placeholder="Apellido materno" required/>
					</div>
				</div>

				<div class="columnitas">
					<div>
						<label for="" class="">Curp: </label>
						<input type="text" name="curp" value="{{$egresado->curp}}" placeholder="Curp" required/>
					</div>

					<div>
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
					</div>
				</div>
				<div class="columnitas">
					<div>
						<label for="" class="">Fecha de nacimiento: </label>
						<input type="date" name="fecha_nacimiento" value="{{$egresado->fecha_nacimiento}}" placeholder="Fecha de nacimiento" required/>
					</div>

					<div>
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
					</div>
				</div>

				<label for="" class="">Lugar de origen: </label>
				<input type="text" name="lugar_origen" value="{{$egresado->lugar_origen}}" placeholder="Lugar de origen" required/>
				<input type="hidden" name="habilitado" value="1" placeholder=""/>
			</div>
				<!--Datos de preparacion-->
			<div class="seccion2">
				<label for="" class="">Carrera: </label>
				<select name="carrera" class="carrera">
					@foreach($carrera as $idn=>$nombre)
						@if( $idn == $preparacion->carrera)
							<option value={{$idn}} selected>{{$nombre}}</option><!--Tipo de datos enum-->
						@else
							<option value={{$idn}}>{{$nombre}}</option>
						@endif
					@endforeach
				</select>

				<label for="" class="">Generación: </label>
				<input type="text" name="generacion" value="{{$preparacion->generacion}}" placeholder="Ejemplo: 2013-2018" required/>

				<label for="" class="">Fecha de inicio de estudios: </label>
				<input type="date" name="fecha_inicio" value="{{$preparacion->fecha_inicio}}" placeholder="Fecha de inicio de estudios" required/>

				<label for="" class="">Fecha de fin de estudios: </label>
				<input type="date" name="fecha_fin" value="{{$preparacion->fecha_fin}}" placeholder="Fecha de fin de estudios" required/>

				<label for="" class="">Promedio: </label>
				<input class="promedio" type="text" name="promedio" value="{{$preparacion->promedio}}" placeholder="Promedio" required/>

				<div class="boton">
					<button type="submit" class="flat">Actualizar</button>
				</div>
			</div>
		</form>

	</div><!--contenedor-->

@stop
