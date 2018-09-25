@extends('admin.layouts.master')

@section('title', 'HistoriasYtips')

@section('style')
<!-- <link href="{{ url('css/ranking.css') }}" rel="stylesheet"> -->
	<link href="{{ url('css/cssadmin/editarTip.css') }}" rel="stylesheet">
@stop

@section('content')
	<div class="contenedor"><!-- contenedor -->
		<div class="div-1">
			<p class="text-center">Editar tip y consejo</p>
		</div><!--div-1-->

		<!--Contenido de la pagina-->
		<form method="post" enctype="multipart/form-data" action="{{route('admin.editarTipConsejo.submit')}}">
			{{ csrf_field() }}
			<input name="_token" type="hidden" value="{!! csrf_token() !!}" />

			<input name="id" type="hidden" value="{{$tip->id}}" />

			<label for="" class="">Titulo: </label>
	 		<input class="nombre" type="text" name="titulo" value="{{$tip->titulo}}"/>

	 		<label for="" class="">Descripción: </label>
	 		<textarea rows="4" cols="50" name="descripcion">{{$tip->descripcion}}</textarea>

			<div class="foto">
		 		<label for="" class="">Foto: </label>
		 		<input id="file-input" name="imagen" type="file"/>
		 		<img id="imgSalida" src="{{ url($tip->imagen_url)}}" alt=""/>
			</div>
			<div class="boton">
	 			<button type="submit" class="flat">Enviar</button>
			</div>
		</form>
	</div><!--contenedor-->
@stop

@section('script')
<script src="{{ url('js/admin/tips.js') }}"></script>
@stop
