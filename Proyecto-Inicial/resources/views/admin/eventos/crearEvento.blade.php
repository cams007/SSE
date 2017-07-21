@extends('admin.layouts.master')

@section('title', 'eventos')

@section('style')

<link href="{{ url('css/ranking.css') }}" rel="stylesheet">
@stop
@section('content')
	<div class="contenedor"><!-- contenedor -->
		<div class="div-1">
			<p class="text-center">Crear eventos</p>

		</div><!--div-1-->

		<!--Contenido de la pagina-->
		<form method="POST" enctype="multipart/form-data" action="{{ route('admin.crearEvento.submit') }}">
			{{ csrf_field() }}<!--No sé para que sea pero debe de ir. jajaja XD-->
			<input name="_token" type="hidden" value="{!! csrf_token() !!}" />
					
			<label for="" class="">Titulo del evento: </label>
	 		<input type="text" name="nombre"/>

	 		<label for="" class="">Descripción: </label>
	 		<textarea rows="4" cols="50" name="descripcion">
	 		</textarea>

	 		<label for="" class="">Lugar del evento: </label>
	 		<input type="text" name="lugar"/>

	 		<label for="" class="">Fecha: </label>
	 		<input type="date" name="fecha"/>

	 		<label for="" class="">Categoria: </label>
	 		<select name="categoria">
	 			<option value="1">Académicos</option>
	 			<option value="2">Culturales</option>
	 		</select>

	 		<label for="" class="">Poster del evento: </label>
	 		<input name="imagen" type="file" />

	 		<button type="submit" class="flat">
						Enviar
			</button>
		</form>

	</div><!--contenedor-->

@stop