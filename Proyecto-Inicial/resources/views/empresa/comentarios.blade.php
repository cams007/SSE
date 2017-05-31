@extends('layouts.master')

@section('title', 'Datos basicos')

@section('style')
<link href="{{ url('css/perfil.css') }}" rel="stylesheet">
<link href="{{ url('css/ofertas.css') }}" rel="stylesheet">
<link href="{{ url('css/empresa.css') }}" rel="stylesheet">
@stop

@section('content')
	<h1 class="text-center">Datos de empresa</h1>
	<hr class="hr">
	<div class="clearfix">
		<aside id="cssmenu" class="column hrV">
			@include('partials.asideEmpresa')
		</aside>
		
		<div class="column content">
				
	    	<center>
	    		<div>Apple</div>
	    		<div>
	    		<h2>3.2</h2>
		    	<img src="{{ url('assets/images/empresa_estrella_full.png') }}">
				<img src="{{ url('assets/images/empresa_estrella_full.png') }}">
				<img src="{{ url('assets/images/empresa_estrella_full.png') }}">
				<img src="{{ url('assets/images/empresa_estrella_empty.png') }}">
				<img src="{{ url('assets/images/empresa_estrella_empty.png') }}">
				<h6>12 evaluaciones</h6>
			</div></center>

			<div class="comentario_list">
				<h5>Pedro Gómez</h5>
				<img src="{{ url('assets/images/empresa_estrella_full.png') }}">
				<img src="{{ url('assets/images/empresa_estrella_full.png') }}">
				<img src="{{ url('assets/images/empresa_estrella_full.png') }}">
				<img src="{{ url('assets/images/empresa_estrella_full.png') }}">
				<img src="{{ url('assets/images/empresa_estrella_empty.png') }}">
				<label class="fecha_comentario">11 abril 2017</label>
				<div>Una empresa muy competitiva que ofrece muchas oportunidades para crecer profesionalmente, buen salario, jornda de trabajo flexible. Excelente.
				</div>
			</div>

			<div class="comentario_list">
				<h5>Juan Castro</h5>
				<img src="{{ url('assets/images/empresa_estrella_full.png') }}">
				<img src="{{ url('assets/images/empresa_estrella_full.png') }}">
				<img src="{{ url('assets/images/empresa_estrella_full.png') }}">
				<img src="{{ url('assets/images/empresa_estrella_empty.png') }}">
				<img src="{{ url('assets/images/empresa_estrella_empty.png') }}">
				<label class="fecha_comentario">09 abril 2017</label>
				<div>Una empresa muy competitiva que ofrece muchas oportunidades para crecer profesionalmente, buen salario, jornda de trabajo flexible. Excelente.
				</div>
			</div>


			<!-- Paginación -->
			<center><div class="paginate">
				<a class="back" href="#"><img src="{{ url('assets/images/paginator_back.png') }}"></a>
		      	<a class="page" href="#">1</a>
		      	<a class="active" href="#">2</a>
		      	<a class="page" href="#">3</a>
		      	<a class="page" href="#">4</a>
		      	<a class="page" href="#">5</a>
		      	<a class="page" href="#">6</a>
		      	<a class="forward" href="#"><img src="{{ url('assets/images/paginator_forward.png') }}"></a>
			</div></center>

		</div>
	
	</div>
@stop