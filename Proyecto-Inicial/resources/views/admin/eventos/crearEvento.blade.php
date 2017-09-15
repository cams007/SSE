@extends('admin.layouts.master')

@section('title', 'eventos')

@section('style')
<link href="{{ url('css/ranking.css') }}" rel="stylesheet">
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
			
			<img src="{{ url('assets/images/crear.png') }}" alt="">
			<label for="" class="">Titulo del evento: </label>
	 		<input type="text" name="nombre" required/>
			
			<img src="{{ url('assets/images/crear.png') }}" alt="">
	 		<label for="" class="">Descripción: </label>
	 		<textarea rows="4" cols="50" name="descripcion" required></textarea>
			
			<img src="{{ url('assets/images/crear.png') }}" alt="">
	 		<label for="" class="">Lugar del evento: </label>
	 		<input type="text" name="lugar" required/>
			
			<img src="{{ url('assets/images/crear.png') }}" alt="">
	 		<label for="" class="">Fecha: </label>
	 		<input type="date" name="fecha" required/>
			
			<img src="{{ url('assets/images/crear.png') }}" alt="">
	 		<label for="" class="">Categoria: </label>
	 		<select name="categoria" required>
	 			<option value="1">Académico</option>
	 			<option value="2">Cultural</option>
	 		</select>
			
			<img src="{{ url('assets/images/crear.png') }}" alt="">
	 		<label for="" class="">Poster del evento: </label>
	 		<input id="file-input" name="imagen" type="file" required/>
	 		<img id="imgSalida" src="" />

	 		<input type="hidden" name="activo" value="1" placeholder=""/>

	 		<button type="submit" class="flat">Crear</button>
		</form>

	</div><!--contenedor-->

@stop

@section('script')
<script src="{{ url('js/admin/evento.js') }}"></script>
@stop