@extends('admin.layouts.master')

@section('title', 'Editar evento')

@section('style')
	<link href="{{ url('css/cssadmin/editarEvento.css') }}" rel="stylesheet">
@stop

@section('script')
	<script src="{{ url('js/admin/evento.js') }}"></script>
@stop

@section('content')
	<div class="contenedor"><!-- contenedor -->
		<div class="div-1">
			<p class="text-center">Editar evento</p>
		</div><!--div-1-->

		<!--Contenido de la pagina-->
		<form method="post" enctype="multipart/form-data" action="{{route('admin.editarEvento.submit')}}">
			{{ csrf_field() }}
			<input name="_token" type="hidden" value="{!! csrf_token() !!}" />

			<input name="id" type="hidden" value="{{$evento->id}}"/>

			<div class="seccion1">
			<label for="" class="">Título del evento: </label>
	 		<input class="nombre" type="text" name="nombre" value="{{ $evento->nombre }}" required/>

	 		<label for="" class="">Descripción: </label>
	 		<textarea rows="4" cols="50" name="descripcion" required>{{$evento->descripcion}}</textarea>

			<div class="columnitas">
				<div>
			 		<label for="" class="">Lugar del evento: </label>
			 		<input type="text" name="lugar" value="{{ $evento->lugar}}" required/>
				</div>

				<div>
			 		<label for="" class="">Fecha: </label>
			 		<input type="date" name="fecha" value="{{$evento->fecha}}" required/>
				</div>
			</div>
	 		<label for="" class="">Categoría: </label>
	 		<select name="categoria" required>
	 			@if($evento->categoria == 'Académico'){{--Se obtiene como string y se envia en numero--}}
	 				<option value="1" selected>Académico</option>
	 				<option value="2">Cultural</option>
	 			@else
	 				<option value="1">Académico</option>
	 				<option value="2" selected>Cultural</option>
	 			@endif
	 		</select>
			</div>

			<div class="seccion2">
	 		<label for="" class="">Póster del evento: </label>
	 		<input id="file-input" name="imagen" type="file" class="input-file" />
	 		<img id="imgSalida" src="{{ url($evento->imagen_url)}}" alt=""/>

			<div class="boton">
		 		<button type="submit" class="flat">
							Actualizar
				</button>
			</div>
			</div>
		</form>

	</div><!--contenedor-->
@stop
