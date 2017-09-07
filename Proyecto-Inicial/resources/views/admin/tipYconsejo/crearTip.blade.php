@extends('admin.layouts.master')

@section('title', 'Tip y consejo')

@section('style')
<link href="{{ url('css/ranking.css') }}" rel="stylesheet">
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
			
			<img src="{{ url('assets/images/crear.png') }}" alt="">
			<label for="" class="">Titulo: </label>
	 		<input type="text" name="titulo" required/>
			
			<img src="{{ url('assets/images/crear.png') }}" alt="">
	 		<label for="" class="">Descripción: </label>
	 		<textarea rows="4" cols="50" name="descripcion" required></textarea>
	 		
	 		<img src="{{ url('assets/images/crear.png') }}" alt="">
	 		<label for="" class="">Foto: </label>
	 		<input name="imagen" type="file" required/>

	 		<input type="hidden" name="activo" value="1" placeholder=""/>

	 		<button type="submit" class="flat">Enviar</button>
		</form>
	</div><!--contenedor-->

@stop