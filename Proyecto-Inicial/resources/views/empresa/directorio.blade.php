@extends('layouts.master')

@section('title', 'Tabulador de salarios')

@section('style')
<link href="{{ url('css/ofertas.css') }}" rel="stylesheet">
<link href="{{ url('css/empresa.css') }}" rel="stylesheet">

@section('content')

	<h1 class="text-center">Directorio de empresas</h1>
	<hr class="hr">

	<!-- Buscador -->
	<div class="buscador_empresas">
		<input type="search" name="q" placeholder="Busacdor de empresas">
	</div>

	<!-- Listado de empresa -->
	<div class="empresa_list">
		<div class="nombre_empresa"><a href="{{url('datos_empresa')}}">KadaSoftware</a></div>
		<div class="calificacion_empresa">
			<img src="{{ url('assets/images/start_select.png') }}">
			<img src="{{ url('assets/images/start_select.png') }}">
			<img src="{{ url('assets/images/start_select.png') }}">
			<img src="{{ url('assets/images/start_noselect.png') }}">
			<img src="{{ url('assets/images/start_noselect.png') }}">
		</div>
		<p>Empresa desarrolladora de software a la medida.</p>
	</div>
	<div class="empresa_list">
		<div class="nombre_empresa"><a href="{{url('datos_empresa')}}">Apple Inc.</a></div>
		<div class="calificacion_empresa">
			<img src="{{ url('assets/images/start_select.png') }}">
			<img src="{{ url('assets/images/start_select.png') }}">
			<img src="{{ url('assets/images/start_select.png') }}">
			<img src="{{ url('assets/images/start_select.png') }}">
			<img src="{{ url('assets/images/start_noselect.png') }}">
		</div>
		<p>Empresa de software y hardware encargada de crear productos de gran innovación.</p>
	</div>
	<div class="empresa_list">
		<div class="nombre_empresa"><a href="{{url('datos_empresa')}}">Elektra</a></div>
		<div class="calificacion_empresa">
			<img src="{{ url('assets/images/start_select.png') }}">
			<img src="{{ url('assets/images/start_select.png') }}">
			<img src="{{ url('assets/images/start_noselect.png') }}">
			<img src="{{ url('assets/images/start_noselect.png') }}">
			<img src="{{ url('assets/images/start_noselect.png') }}">
		</div>
		<p>Empresa de software y hardware encargada de crear productos de gran innovación.</p>
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

@stop