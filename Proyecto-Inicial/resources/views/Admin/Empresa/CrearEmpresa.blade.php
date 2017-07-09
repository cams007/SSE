@extends('admin.layouts.master')

@section('title', 'Alta empresa')

@section('style')

<link href="{{ url('css/ranking.css') }}" rel="stylesheet">
@stop
@section('content')
	<div class="contenedor"><!-- contenedor -->
		<div class="div-1">
			<p class="text-center">Alta empresa</p>

		</div><!--div-1-->

		<form action="" method="post" enctype="multipart/form-data">
	 		<label for="" class="">Nombre de la empresa: </label>
	 		<input type="text" name="nombre_emp"/>

	 		<label for="" class="">Giro de la empresa: </label>
	 		<input type="text" name="giro_emp"/>

	 		<label for="" class="">Sector: </label>
	 		<select name="sector_emp">
	 			<option value="ic">Computación</option><!--claves de carreras-->
	 			<option value="id">Diseño</option>
	 			<option value="ie">Electronica</option>
	 			<option value="im">Mecatronica</option>
	 		</select>

	 		<label for="" class="">RFC: </label>
	 		<input type="text" name="rfc_emp"/>

	 		<label for="" class="">Dirección: </label>
	 		<input type="text" name="direccion_emp"/>

	 		<label for="" class="">Página web: </label>
	 		<input type="text" name="paginaWeb_emp"/>

	 		<label for="" class="">Fotografía de la empresa: </label>
	 		<input name="uploadedfile" type="file" />

	 		<label for="" class="">Nombre del contacto: </label>
	 		<input type="text" name="nombre_cont"/>

	 		<label for="" class="">Puesto: </label>
	 		<input type="text" name="puesto_cont"/>

	 		<label for="" class="">Número telefónico: </label>
	 		<input type="text" name="numeroTel_cont"/>

	 		<label for="" class="">Correo electrónico: </label>
	 		<input type="email" name="email_cont"/>

	 		<input type="submit" value="Enviar">
		</form>	

	</div><!--contenedor-->

@stop