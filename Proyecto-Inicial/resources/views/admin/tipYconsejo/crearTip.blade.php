@extends('admin.layouts.master')

@section('title', 'Crear tip y consejo')

@section('style')
<!-- <link href="{{ url('css/ranking.css') }}" rel="stylesheet"> -->
	<link href="{{ url('css/cssadmin/crearTip.css') }}" rel="stylesheet">
@stop

@section('script')
	<script src="{{ url('js/admin/tips.js') }}"></script>
@stop

@section('content')
	<div class="contenedor"><!-- contenedor -->
		<div class="div-1">
			<p class="text-center">Crear tips y consejos</p>

		</div><!--div-1-->

		<!--Contenido de la pagina--><!--Accedemos por medio del name de la ruta-->
		<form method="POST" enctype="multipart/form-data" action="{{ route('admin.crearTipConsejo.submit') }}">
			{{ csrf_field() }}
			<input name="_token" type="hidden" value="{!! csrf_token() !!}" />

			<label for="" class="">Título: </label>
	 		<input class="nombre" type="text" name="titulo" placeholder="Título del tip" required/>

	 		<label for="" class="">Descripción: </label>
	 		<textarea rows="4" cols="50" name="descripcion" placeholder="Descripción del tip" required></textarea>

			<div class="foto">
		 		<label for="" class="">Foto: </label>
		 		<input id="file-input" name="imagen" type="file" required/><br/>
		 		<img id="imgSalida" src="" />
			</div>
	 		<input type="hidden" name="activo" value="1" placeholder="" required/>

			<div class="boton">
	 			<button type="submit" class="flat">Guardar</button>
			</div>
		</form>
	</div><!--contenedor-->

@stop