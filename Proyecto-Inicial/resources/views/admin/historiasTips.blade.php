@extends('admin.layouts.master')

@section('title', 'HistoriasYtips')

@section('style')
	<link href="{{ url('css/ranking.css') }}" rel="stylesheet">
@stop

@section('content')
	<div class="contenedor"><!-- contenedor -->
		<div class="div-1">
			<p class="text-center">Historias de exito y tips</p>

		</div><!--div-1-->

		<!--Contenido de la pagina-->
		<form method="get" action="">
			<label for="" class="">Titulo: </label>
	 		<input type="text" name="nombre"/>

	 		<label for="" class="">Descripción: </label>
	 		<textarea rows="4" cols="50">
	 		</textarea>
	 		
	 		<label for="" class="">Imagen: </label>
	 		<input name="uploadedfile" type="file" />

	 		<label for="" class="">Fecha de vijencia: </label>
	 		<input type="date" name="fecha"/>

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