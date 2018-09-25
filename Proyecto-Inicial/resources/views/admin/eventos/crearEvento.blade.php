@extends('admin.layouts.master')

@section('title', 'eventos')

@section('style')
<!-- <link href="{{ url('css/ranking.css') }}" rel="stylesheet"> -->
	<link href="{{ url('css/cssadmin/crearEvento.css') }}" rel="stylesheet">
@stop

@section('content')
	<div class="contenedor"><!-- contenedor -->
		<div class="div-1">
			<p class="text-center">Crear eventos</p>
		</div><!--div-1-->

		<!--Contenido de la pagina-->
		<form method="POST" enctype="multipart/form-data" action="{{route('admin.crearEvento.submit')}}">
			{{ csrf_field() }}
			<input name="_token" type="hidden" value="{!! csrf_token() !!}" />
			<div class="seccion1">
			<label for="" class="">Titulo del evento: </label>
	 		<input class="nombre" type="text" name="nombre" required/>

	 		<label for="" class="">Descripción: </label>
	 		<textarea rows="4" cols="50" name="descripcion" required></textarea>

			<div class="columnitas">
				<div>
			 		<label for="" class="">Lugar del evento: </label>
			 		<input type="text" name="lugar" required/>
				</div>

				<div>
			 		<label for="" class="">Fecha: </label>
			 		<input type="date" name="fecha" required/>
				</div>
			</div>
	 		<label for="" class="">Categoria: </label>
	 		<select name="categoria" required>
	 			<option value="1">Académico</option>
	 			<option value="2">Cultural</option>
	 		</select>
			</div>
			<div class="seccion2">
	 		<label for="" class="">Poster del evento: </label>
	 		<input id="file-input" name="imagen" type="file" required/>
	 		<img id="imgSalida" src="" />

	 		<input type="hidden" name="activo" value="1" placeholder=""/>
			<div class="boton">
	 			<button type="submit" class="flat">Crear</button>
			</div>
			</div>
		</form>

	</div><!--contenedor-->

@stop

@section('script')
<script src="{{ url('js/admin/evento.js') }}"></script>
@stop
