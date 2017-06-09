@extends('layouts.master')

@section('title', 'Tips y Consejos')

@section('content')
	<h1 class="text-center">Tips y Consejos</h1>
	<hr class="hr">
	
	<div>
		<div>
			<figure>
	 			<img src="{{ url('assets/images/tipsC1.jpg') }}" width="200" height="153">
			</figure>
			<a href=""><h1>7 Consejos para la redacción de un trabajo escrito</h1></a>
			<p>
				La elaboración de un trabajo escrito podría pensarse como una situación en la que si <br> se tiene un tema, solo se deberá escribir acerca de este y sus características <br>principales. Pero la verdad es que no.<br>
			</p>
			<a href=""><p>[Seguír leyendo]</p></a>
		</div>

		<div>
			<figure>
	 			<img src="{{ url('assets/images/tipsC2.jpg') }}" width="200" height="153">
			</figure>
			<a href=""><h1>La Importancia de la Lectura</h1></a>
			<p>
				Leer un libro es una de las maneras más eficaces para calmar nuestra mente y ayudarnos a dormir. Se ha encontrado que las luces brillantes de los objetos electrónicos indican al cerebro que es hora de despertar.
			</p>
			<a href=""><p>[Seguír leyendo]</p></a>
		</div>
		
		<!-- Paginación -->
		<div class="paginate">
			<a class="back" href="#"><img src="{{ url('assets/images/paginator_back.png') }}"></a>
	      	<a class="page" href="#">1</a>
	      	<a class="active" href="#">2</a>
	      	<a class="page" href="#">3</a>
	      	<a class="page" href="#">4</a>
	      	<a class="page" href="#">5</a>
	      	<a class="forward" href="#"><img src="{{ url('assets/images/paginator_forward.png') }}"></a>
		</div>
	</div>

@stop