@extends('layouts.master')

@section('title', 'Editar empresa')

@section('style')

<link href="{{ url('css/ranking.css') }}" rel="stylesheet">
@stop
@section('content')
	<div class="contenedor"><!-- contenedor -->
		<div class="div-1">
			<p class="text-center">Editar empresa</p>

		</div><!--div-1-->

		<form action="" method="post" enctype="multipart/form-data">
	 		<label for="" class="">Nombre: </label>
	 		<input type="text" name="nombre"/>

	 		<label for="" class="">RFC: </label>
	 		<input type="text" name="rfc"/>

	 		<label for="" class="">Direccion: </label>
	 		<input type="text" name="direccion"/>

	 		<label for="" class="">Página web: </label>
	 		<input type="text" name="paginaWeb"/>

	 		<label for="" class="">Imagen de la empresa: </label>
	 		<input name="uploadedfile" type="file" />

	 		<label for="" class="">Nombre del contacto: </label>
	 		<input type="text" name="nombreContacto"/>

	 		<label for="" class="">Número telefónico: </label>
	 		<input type="text" name="numeroTel"/>

	 		<label for="" class="">Correo electrónico: </label>
	 		<input type="email" name="email"/>

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