@extends('admin.layouts.master')

@section('title', 'Historia De')

@section('style')
<link href="{{ url('css/ranking.css') }}" rel="stylesheet">
@stop

@section('content')
	<div class="contenedor"><!-- contenedor -->
		<div class="div-1">
			<p class="text-center">Crear historias de éxito</p>

		</div><!--div-1-->

		<!--Contenido de la pagina-->
		<form method="POST" enctype="multipart/form-data" action="{{ route('admin.crearHistoria.submit') }}">
			{{ csrf_field() }}
			<input name="_token" type="hidden" value="{!! csrf_token() !!}" />

			<label for="" class="">Titulo: </label>
	 		<input type="text" name="titulo" required/>

	 		<label for="" class="">Descripción: </label>
	 		<textarea rows="4" cols="50" name="descripcion" required></textarea>
	 		
	 		<label for="" class="">Foto: </label>
	 		<input name="imagen" type="file" required/>

	 		<input type="hidden" name="activo" value="1" placeholder=""/>

	 		<button type="submit" class="flat">Enviar</button>
		</form>
	</div><!--contenedor-->

@stop