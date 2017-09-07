@extends('admin.layouts.master')

@section('title', 'HistoriasYtips')

@section('style')
<link href="{{ url('css/ranking.css') }}" rel="stylesheet">
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
			
			<img src="{{ url('assets/images/crear.png') }}" alt="">
			<label for="" class="">Titulo: </label>
	 		<input type="text" name="titulo" value="{{$historia->titulo}}"/>
			
			<img src="{{ url('assets/images/crear.png') }}" alt="">
	 		<label for="" class="">Descripción: </label>
	 		<textarea rows="4" cols="50" name="descripcion">{{$historia->descripcion}}</textarea>
	 		
	 		<img src="{{ url('assets/images/crear.png') }}" alt="">
	 		<label for="" class="">Foto: </label>
	 		<input name="imagen" type="file"/>
	 		<img src="{{ url($historia->imagen_url)}}" alt=""/>

	 		<button type="submit" class="flat">Enviar</button>
		</form>
	</div><!--contenedor-->
@stop