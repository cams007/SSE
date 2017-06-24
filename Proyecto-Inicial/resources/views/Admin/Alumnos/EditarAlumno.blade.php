@extends('layouts.master')

@section('title', 'Editar alumno')

@section('style')

<link href="{{ url('css/ranking.css') }}" rel="stylesheet">
@stop
@section('content')
	<div class="contenedor"><!-- contenedor -->
		<div class="div-1">
			<p class="text-center">Editar alumno</p>

		</div><!--div-1-->

		<form action="" method="post">
			<label for="" class="">Matricula: </label>
	 		<input type="text" name="matricula"/>

	 		<label for="" class="">Nombre: </label>
	 		<input type="text" name="nombre"/>

	 		<label for="" class="">Carrera: </label>
	 		<select name="carrera">
	 			<option value="ing.comp">Computación</option>
	 			<option value="ing.dise">Diseño</option>
	 			<option value="ing.elec">Electronica</option>
	 			<option value="ing.meca">Mecatronica</option>
	 		</select>

	 		<label for="" class="">Fecha de nacimiento: </label>
	 		<input type="date" name="fecha_nac"/>

	 		<label for="" class="">Fecha de ingreso: </label>
	 		<input type="date" name="fecha_ing"/>

	 		<label for="" class="">Promedio: </label>
	 		<input type="text" name="promedio"/>

	 		<label for="" class="">Titulacion: </label>
	 		<select name="titulacion">
	 			<option value="promedio">Promedio</option>
	 			<option value="ceneval">Ceneval</option>
	 			<option value="tesis">Tesis</option>
	 		</select>

	 		<label for="" class="">Aprobado por: </label>
	 		<input type="text" name="aprobado"/>

	 		<label for="" class="">Especialidad: </label> <!--Esto va a actualizarse en base-->
	 		<select name="especialidad">					<!--a la carrera-->
	 			<option value="ia">IA</option>
	 			<option value="redes">Redes</option>
	 			<option value="software">Software</option>
	 		</select>
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