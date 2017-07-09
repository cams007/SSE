@extends('admin.layouts.master')

@section('title', 'Editar-evento')

@section('style')

<link href="{{ url('css/ranking.css') }}" rel="stylesheet">
@stop
@section('content')
	<div class="contenedor"><!-- contenedor -->
		<div class="div-1">
			<p class="text-center">Editar evento</p>

		</div><!--div-1-->

		<!--Contenido de la pagina-->
		<form method="get" action="">
			<label for="" class="">Titulo del evento: </label>
	 		<input type="text" name="nombre"/>

	 		<label for="" class="">Descripción: </label>
	 		<textarea rows="4" cols="50">
	 		</textarea>

	 		<label for="" class="">Lugar del evento: </label>
	 		<input type="text" name="lugar"/>

	 		<label for="" class="">Fecha: </label>
	 		<input type="date" name="fecha"/>

	 		<label for="" class="">Categoria: </label>
	 		<select name="categoria">
	 			<option value="culturales">Culturales</option>
	 			<option value="academicos">Académicos</option>
	 		</select>

	 		<label for="" class="">Poster del evento: </label>
	 		<input name="uploadedfile" type="file" />

	 		<button type="submit" class="flat">
						Editar
			</button>
		</form>

	</div><!--contenedor-->

@stop