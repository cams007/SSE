@extends('admin.layouts.master')

@section('title', 'Historia De')

@section('style')
<!-- <link href="{{ url('css/ranking.css') }}" rel="stylesheet"> -->
	<link href="{{ url('css/cssadmin/crearHistorias.css') }}" rel="stylesheet">
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
	 		<input class="nombre" type="text" name="titulo" required/>

	 		<label for="" class="">Descripción: </label>
	 		<textarea rows="4" cols="50" name="descripcion" required></textarea>

			<div class="foto">
		 		<label for="" class="">Foto: </label>
		 		<input id="file-input" name="imagen" type="file" required/>
		 		<img id="imgSalida" src="" />
			</div>
			
	 		<input type="hidden" name="activo" value="1" placeholder=""/>
			<div class="boton">
	 			<button type="submit" class="flat">Crear</button>
			</div>
		</form>
	</div><!--contenedor-->

@stop

@section('script')
<script src="{{ url('js/admin/historiaDExito.js') }}"></script>
@stop
