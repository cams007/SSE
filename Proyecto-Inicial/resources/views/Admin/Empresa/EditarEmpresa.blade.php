@extends('admin.layouts.master')

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
	 		<label for="" class="">Nombre de la empresa: </label>
	 		<input type="text" name="nombre_emp"/>

	 		<label for="" class="">Descripción: </label>
	 		<textarea rows="4" cols="50" name="descripcion">
	 		</textarea>

	 		<label for="" class="">RFC: </label>
	 		<input type="text" name="rfc_emp"/>

	 		<label for="" class="">Telefono: </label>
	 		<input type="text" name="telefono"/>

	 		<label for="" class="">Correo: </label>
	 		<input type="text" name="correo"/>

	 		<label for="" class="">Dirección calle y número:</label>
	 		<input type="text" name="direccion_emp"/>

	 		<label for="" class="">Colonia:</label>
	 		<input type="text" name="colonia"/>

	 		<label for="" class="">Ciudad:</label>
	 		<input type="text" name="ciudad"/>

	 		<label for="" class="">Estado:</label>
	 		<input type="text" name="estado"/>

	 		<label for="" class="">Código postal:</label>
	 		<input type="text" name="codigo_postal"/>

	 		<label for="" class="">Página web: </label>
	 		<input type="text" name="pagina_web"/>

	 		<label for="" class="">Fotografía de la empresa: </label>
	 		<input name="imagen_url" type="file" />

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