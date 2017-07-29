@extends('admin.layouts.master')

@section('title', 'Tip y consejo')

@section('style')
<link href="{{ url('css/ranking.css') }}" rel="stylesheet">
@stop

@section('content')
	<div class="contenedor"><!-- contenedor -->
		<div class="div-1">
			<p class="text-center">Crear tips y consejos</p>

		</div><!--div-1-->

		<!--Contenido de la pagina-->
		<form method="POST" enctype="multipart/form-data" action="{{ route('admin.crearTipConsejo.submit') }}">
			{{ csrf_field() }}
			<input name="_token" type="hidden" value="{!! csrf_token() !!}" />

			<label for="" class="">Titulo: </label>
	 		<input type="text" name="titulo"/>

	 		<label for="" class="">Descripción: </label>
	 		<textarea rows="4" cols="50" name="descripcion"></textarea>
	 		
	 		<label for="" class="">Foto: </label>
	 		<input name="imagen" type="file"/>

	 		<button type="submit" class="flat">Enviar</button>
		</form>
	</div><!--contenedor-->

@stop