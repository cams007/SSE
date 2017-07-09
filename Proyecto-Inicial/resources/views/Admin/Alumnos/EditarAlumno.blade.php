@extends('admin.layouts.master')

@section('title', 'Editar egresados')

@section('style')

<link href="{{ url('css/ranking.css') }}" rel="stylesheet">
@stop
@section('content')
	<div class="contenedor"><!-- contenedor -->
		<div class="div-1">
			<p class="text-center">Editar egresados</p>

		</div><!--div-1-->

		<form action="" method="post">
			<label for="" class="">Matricula: </label>
	 		<input type="text" name="matricula" placeholder="ejemplo:201203956"/>

	 		<label for="" class="">Nombre: </label>
	 		<input type="text" name="nombre" placeholder=""/>

	 		<label for="" class="">Curp: </label>
	 		<input type="text" name="curp" placeholder=""/>

	 		<label for="" class="">Género: </label>
	 		<select name="carrera">
	 			<option value="1">Masculino</option><!--Tipo de datos enum-->
	 			<option value="2">Femenino</option>
	 		</select>

	 		<label for="" class="">Fecha de nacimiento: </label>
	 		<input type="date" name="fecha_nac" placeholder="" />

	 		<label for="" class="">Lugar de origen: </label>
	 		<input type="text" name="Lugar_org" placeholder=""/>

	 		<label for="" class="">Carrera: </label>
	 		<select name="carrera">
	 			<option value="ic">Computación</option><!--claves de carreras-->
	 			<option value="id">Diseño</option>
	 			<option value="ie">Electronica</option>
	 			<option value="im">Mecatronica</option>
	 		</select>

	 		<label for="" class="">Especialidad: </label>
	 		<select name="especialidad">
	 			<option value="1">Ing. Software</option><!--claves de carreras-->
	 			<option value="2">Inteligencia Artificial</option>
	 			<option value="3">Redes</option>
	 		</select>

	 		<label for="" class="">Generación: </label>
	 		<input type="text" name="generacion" placeholder=""/>


	 		<label for="" class="">Fecha de ingreso: </label>
	 		<input type="date" name="fecha_ing" placeholder=""/>

	 		<label for="" class="">Fecha de egreso: </label>
	 		<input type="date" name="fecha_egr"/>

	 		<label for="" class="">Promedio: </label>
	 		<input type="text" name="promedio" placeholder=""/>

	 		<!--<label for="" class="">Forma de titulación: </label>
	 		<select name="especialidad">
	 			<option value="1">Tesis</option>
	 			<option value="2">CENEVAL</option>
	 			<option value="3">No titulado</option>
	 		</select>-->

	 		<button type="submit" class="flat">
						Editar
			</button>
		</form>		

	</div><!--contenedor-->

@stop