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

		<form method="post" enctype="multipart/form-data" action="{{route('admin.crearEmpresa.submit')}}">
			{{ csrf_field() }}
			<input name="_token" type="hidden" value="{!! csrf_token() !!}" />

	 		<label for="" class="">Nombre de la empresa: </label>
	 		<input type="text" name="nombre_emp" required/>

	 		<label for="" class="">Descripción: </label>
	 		<textarea rows="4" cols="50" name="descripcion" required></textarea>

	 		<label for="" class="">RFC: </label>
	 		<input type="text" name="rfc_emp"/>

	 		<label for="" class="">Telefono: </label>
	 		<input type="text" name="telefono_emp" required/>

	 		<label for="" class="">Correo: </label>
	 		<input type="email" name="correo_emp" required/>

	 		<label for="" class="">Dirección calle,número:</label>
	 		<input type="text" name="direccion_emp" required/>

	 		<label for="" class="">Colonia:</label>
	 		<input type="text" name="colonia" required/>

	 		<label for="" class="">Ciudad:</label>
	 		<input type="text" name="ciudad" required/>

	 		<label for="" class="">Estado:</label>
	 		<input type="text" name="estado" required/>

	 		<label for="" class="">Código postal:</label>
	 		<input type="text" name="codigo_p" required/>

	 		<label for="" class="">Página web: </label>
	 		<input type="text" name="pagina_w" required/>

	 		<label for="" class="">Fotografía de la empresa: </label>
	 		<input type="file" name="imagen" required/>

	 		<input type="hidden" name="habilitado" value="1" placeholder=""/>

	 		<label for="" class="">Motivos de no contratacion: </label>
	 		<textarea rows="4" cols="50" name="noContratacion"></textarea>

	 		<label for="" class="">Recomendaciones: </label>
	 		<textarea rows="4" cols="50" name="recomendacion" required></textarea>

			<!--Datos del contacto de la empresa-->
	 		<label for="" class="">Nombre del contacto: </label>
	 		<input type="text" name="nombre_cont" required/>

	 		<label for="" class="">Puesto: </label>
	 		<input type="text" name="puesto_cont" required/>

	 		<label for="" class="">Número telefónico: </label>
	 		<input type="text" name="numeroTel_cont" required/>

	 		<label for="" class="">Correo electrónico: </label>
	 		<input type="email" name="email_cont" required/>

	 		<button type="submit" class="flat">Enviar</button>
		</form>	

	</div><!--contenedor-->

@stop