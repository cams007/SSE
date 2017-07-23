@extends('admin.layouts.master')

@section('title', 'Editar-evento')

@section('style')

<link href="{{ url('css/ranking.css') }}" rel="stylesheet">
@stop

@section('content')
	<div class="contenedor"><!-- contenedor -->
		<div class="div-1">
			<p class="text-center">Editar evento</p>

		</div><!--div-1-->

		<!--Contenido de la pagina-->
		<form method="post" enctype="multipart/form-data" action="{{route('admin.editarEvento.submit')}}">
			{{ csrf_field() }}<!--No sé para que sea pero debe de ir. jajaja XD-->
			<input name="_token" type="hidden" value="{!! csrf_token() !!}" />
			
			<input name="id" type="hidden" value="{{$evento->id}}" />

			<label for="" class="">Titulo del evento: </label>
	 		<input type="text" name="nombre" value="{{ $evento->nombre }}" />

	 		<label for="" class="">Descripción: </label>
	 		<textarea rows="4" cols="50" name="descripcion">{{$evento->descripcion}}</textarea>

	 		<label for="" class="">Lugar del evento: </label>
	 		<input type="text" name="lugar" value="{{ $evento->lugar}}" />

	 		<label for="" class="">Fecha: </label>
	 		<input type="date" name="fecha" value="{{$evento->fecha}}"/>
			
	 		<label for="" class="">Categoria: </label>
	 		<select name="categoria">
	 			@if($evento->categoria == 'Académico'){{--Se obtiene como string y se envia en numero--}}
	 				<option value="1" selected>Académico</option>
	 				<option value="2">Cultural</option>
	 			@else
	 				<option value="1">Académico</option>
	 				<option value="2" selected>Cultural</option>
	 			@endif
	 		</select>
			
	 		<label for="" class="">Poster del evento: </label>
	 		<input name="imagen" type="file"/>
	 		<img src="{{ url($evento->imagen_url)}}" alt=""/>

	 		<button type="submit" class="flat">
						Editar
			</button>
		</form>

	</div><!--contenedor-->

@stop