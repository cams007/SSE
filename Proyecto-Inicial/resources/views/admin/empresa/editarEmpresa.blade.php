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

		@php
			$sector = array(1=>'Pública',2=>'Privada',3=>'Propia');
		@endphp

		<form method="post" enctype="multipart/form-data" action="{{route('admin.editarEmpresa.submit')}}">
	 		{{ csrf_field() }}
			<input name="_token" type="hidden" value="{!! csrf_token() !!}" />

			<input name="id" type="hidden" value="{{$empresa->id}}" />

	 		<label for="" class="">Nombre de la empresa: </label>
	 		<input type="text" name="nombre_emp" value="{{$empresa->nombre}}" />

	 		<label for="" class="">Descripción: </label>
	 		<textarea rows="4" cols="50" name="descripcion">{{$empresa->descripcion}}</textarea>

	 		<label for="" class="">RFC: </label>
	 		<input type="text" name="rfc_emp" value="{{$empresa->rfc}}"/>

	 		<label for="" class="">Sector: </label>
	 		<select name="sector">
	 			@foreach($sector as $idn=>$nombre)
	 				@if($nombre == $empresa->sector)
	 					<option value={{$nombre}} selected>{{$nombre}}</option><!--Tipo de datos enum-->
	 				@else
	 					<option value={{$nombre}}>{{$nombre}}</option><!--Tipo de datos enum-->
	 				@endif
	 			@endforeach
	 		</select>

	 		<label for="" class="">Giro: </label>
	 		<input type="text" name="giro" value="{{$empresa->giro}}" />

	 		<label for="" class="">Telefono: </label>
	 		<input type="text" name="telefono_emp" value="{{$empresa->telefono}}"/>

	 		<label for="" class="">Correo: </label>
	 		<input type="email" name="correo_emp" value="{{$empresa->correo}}"/>

	 		<label for="" class="">Calle: </label>
	 		<input type="text" name="calle" value="{{$empresa->calle}}" required/>

	 		<label for="" class="">Número: </label>
	 		<input type="text" name="numero" value="{{$empresa->numero}}" required/>

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

	 		<input name="contacto_id" type="hidden" value="{{$empresa->contacto_id}}" />

	 		<label for="" class="">Motivos de no contratacion: </label>
	 		<textarea rows="4" cols="50" name="noContratacion">{{$empresa->motivo_no_contratacion}}</textarea>

	 		<label for="" class="">Recomendaciones: </label>
	 		<textarea rows="4" cols="50" name="recomendacion">{{$empresa->recomendaciones}}</textarea>

			<!--Datos del contacto de la empresa-->
			<input name="idcontacto" type="hidden" value="{{$contacto->id}}" />

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