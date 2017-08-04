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
	 		{{ csrf_field() }}
			<input name="_token" type="hidden" value="{!! csrf_token() !!}" />

	 		<label for="" class="">Nombre de la empresa: </label>
	 		<input type="text" name="nombre_emp" value="{{$empresa->nombre}}" />

	 		<label for="" class="">Descripción: </label>
	 		<textarea rows="4" cols="50" name="descripcion">{{$empresa->descripcion}}</textarea>

	 		<label for="" class="">RFC: </label>
	 		<input type="text" name="rfc_emp" value="{{$empresa->rfc}}"/>

	 		<label for="" class="">Telefono: </label>
	 		<input type="text" name="telefono_emp" value="{{$empresa->telefono}}"/>

	 		<label for="" class="">Correo: </label>
	 		<input type="email" name="correo_emp" value="{{$empresa->correo}}"/>

	 		<label for="" class="">Dirección calle y número:</label>
	 		<input type="text" name="direccion_emp" value="{{$empresa->calle . "," .$empresa->numero}}"/>

	 		<label for="" class="">Colonia:</label>
	 		<input type="text" name="colonia" value="{{$empresa->colonia}}"/>

	 		<label for="" class="">Ciudad:</label>
	 		<input type="text" name="ciudad" value="{{$empresa->ciudad}}"/>

	 		<label for="" class="">Estado:</label>
	 		<input type="text" name="estado" value="{{$empresa->estado}}"/>

	 		<label for="" class="">Código postal:</label>
	 		<input type="text" name="codigo_p" value="{{$empresa->codigo_postal}}"/>

	 		<label for="" class="">Página web: </label>
	 		<input type="text" name="pagina_w" value="{{$empresa->pagina_web}}"/>

	 		<label for="" class="">Fotografía de la empresa: </label>
	 		<input type="file" name="imagen"/>
	 		<img src="{{ url($empresa->imagen_url)}}" alt=""/>

	 		<!--<input type="hidden" name="habilitado" value="1" placeholder=""/>-->

	 		<label for="" class="">Motivos de no contratacion: </label>
	 		<textarea rows="4" cols="50" name="noContratacion">{{$empresa->motivo_no_contratacion}}</textarea>

	 		<label for="" class="">Recomendaciones: </label>
	 		<textarea rows="4" cols="50" name="recomendacion">{{$empresa->recomendaciones}}</textarea>

			<!--Datos del contacto de la empresa-->
	 		<label for="" class="">Nombre del contacto: </label>
	 		<input type="text" name="nombre_cont" value="{{$contacto->nombre}}"/>

	 		<label for="" class="">Puesto: </label>
	 		<input type="text" name="puesto_cont" value="{{$contacto->puesto}}"/>

	 		<label for="" class="">Número telefónico: </label>
	 		<input type="text" name="numeroTel_cont" value="{{$contacto->telefono}}"/>

	 		<label for="" class="">Correo electrónico: </label>
	 		<input type="email" name="email_cont" value="{{$contacto->correo}}"/>

	 		<button type="submit" class="flat">Enviar</button>
		</form>	
	
	</div><!--contenedor-->

@stop