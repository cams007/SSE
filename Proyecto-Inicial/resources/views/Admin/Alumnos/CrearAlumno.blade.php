@extends('Admin.layouts.master')

@section('title', 'Alta egresados')

@section('style')

<link href="{{ url('css/ranking.css') }}" rel="stylesheet">
@stop
@section('content')
	<div class="contenedor"><!-- contenedor -->
		<div class="div-1">
			<p class="text-center">Alta egresados</p>

		</div><!--div-1-->

		<form action="" method="post">
			<label for="" class="">Matricula: </label>
	 		<input type="text" name="matricula"/>

	 		<label for="" class="">Nombre: </label>
	 		<input type="text" name="nombre"/>

	 		<label for="" class="">Curp: </label>
	 		<input type="text" name="curp"/>

	 		<label for="" class="">Fecha de nacimiento: </label>
	 		<input type="date" name="fecha_nac"/>

	 		<label for="" class="">Lugar de origen: </label>
	 		<input type="text" name="Lugar_org"/>

	 		<label for="" class="">Carrera: </label>
	 		<select name="carrera">
	 			<option value="ic">Computación</option><!--claves de carreras-->
	 			<option value="id">Diseño</option>
	 			<option value="ie">Electronica</option>
	 			<option value="im">Mecatronica</option>
	 		</select>

	 		<label for="" class="">Especialidad: </label>
	 		<select name="especialidad">
	 			<option value="software">Ing. Software</option><!--claves de carreras-->
	 			<option value="ia">Inteligencia Artificial</option>
	 			<option value="redes">Redes</option>
	 		</select>

	 		<label for="" class="">Generación: </label>
	 		<input type="text" name="generacion"/>


	 		<label for="" class="">Fecha de ingreso: </label>
	 		<input type="date" name="fecha_ing"/>

	 		<label for="" class="">Fecha de egreso: </label>
	 		<input type="date" name="fecha_egr"/>

	 		<label for="" class="">Promedio: </label>
	 		<input type="text" name="promedio"/>

	 		<input type="submit" value="Enviar">
		</form>	

	
	
		<div class="div-5"><!--div-5-->
			<!-- Paginación -->
			<div class="paginate">
				<a class="back" href="#"><img src="{{ url('assets/images/paginator_back.png') }}"></a>
		      	<a class="page" href="#">1</a>
		      	<a class="active" href="#">2</a>
		      	<a class="page" href="#">3</a>
		      	<a class="page" href="#">4</a>
		      	<a class="page" href="#">5</a>
		      	<a class="forward" href="#"><img src="{{ url('assets/images/paginator_forward.png') }}"></a>
			</div>
		</div><!--div-5-->
	</div><!--contenedor-->

@stop