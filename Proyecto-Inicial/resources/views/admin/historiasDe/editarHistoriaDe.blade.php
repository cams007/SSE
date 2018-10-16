@extends('admin.layouts.master')

@section('title', 'Editar historia')

@section('style')
<!-- <link href="{{ url('css/ranking.css') }}" rel="stylesheet"> -->
	<link href="{{ url('css/cssadmin/editarHistorias.css') }}" rel="stylesheet">
@stop

@section('script')
	<script src="{{ url('js/admin/historiaDExito.js') }}"></script>
@stop

@section('content')
	<div class="contenedor"><!-- contenedor -->
		<div class="div-1">
			<p class="text-center">Editar historia de éxito</p>
		</div><!--div-1-->

		<!--Contenido de la pagina-->
		<form method="post" enctype="multipart/form-data" action="{{route('admin.editarHistoria.submit')}}">
			{{ csrf_field() }}
			<input name="_token" type="hidden" value="{!! csrf_token() !!}" />

			<input name="id" type="hidden" value="{{$historia->id}}" />

			<label for="" class="">Título: </label>
	 		<input class="nombre" type="text" name="titulo" value="{{$historia->titulo}}" placeholder ="Título de la historia" required>

	 		<label for="" class="">Descripción: </label>
	 		<textarea rows="4" cols="50" name="descripcion" placeholder ="Descripción de la historia" required>{{$historia->descripcion}}</textarea>

			<div class="foto">
		 		<label for="" class="">Foto: </label>
		 		<input id="file-input" name="imagen" type="file"/>
		 		<img id="imgSalida" src="{{ url($historia->imagen_url)}}" alt=""/>
			</div>

			<div class="boton">
	 			<button type="submit" class="flat">Actualizar</button>
			</div>
		</form>
	</div><!--contenedor-->
@stop
