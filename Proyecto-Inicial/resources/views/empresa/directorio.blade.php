@extends('layouts.master')

@section('title', 'Tabulador de salarios')

@section('style')
<!--<link href="{{ url('css/ofertas.css') }}" rel="stylesheet">-->
<link href="{{ url('css/empresa.css') }}" rel="stylesheet">

@section('content')

	<div class="contenedor"><!--contenedor-->

	<p class="text-center">Directorio de empresas</p>
	<hr class="hr">

	<!-- Buscador -->
	<div class="buscador_empresas">
		<input type="search" name="q" placeholder="Busacdor de empresas">
	</div>

	<div class="listado"><!--listado-->
	<!-- Listado de empresa -->
	<div class="empresa_list">
		<div class="calificacion"><!--calificacion-->
		<div class="nombre_empresa"><a href="{{url('datos_empresa')}}">KadaSoftware</a></div>
		<div class="calificacion_empresa">
			<img src="{{ url('assets/images/empresa_estrella_full.png') }}">
			<img src="{{ url('assets/images/empresa_estrella_full.png') }}">
			<img src="{{ url('assets/images/empresa_estrella_full.png') }}">
			<img src="{{ url('assets/images/empresa_estrella_empty.png') }}">
			<img src="{{ url('assets/images/empresa_estrella_empty.png') }}">
		</div>
	</div><!--calificacion-->
		<p class="descripcion">Empresa desarrolladora de software a la medida.</p>
	</div>
	<div class="empresa_list">
		<div class="calificacion"><!--calificacion-->
			<div class="nombre_empresa"><a href="{{url('datos_empresa')}}">Apple Inc.</a></div>
				<div class="calificacion_empresa">
					<img src="{{ url('assets/images/empresa_estrella_full.png') }}">
					<img src="{{ url('assets/images/empresa_estrella_full.png') }}">
					<img src="{{ url('assets/images/empresa_estrella_full.png') }}">
					<img src="{{ url('assets/images/empresa_estrella_full.png') }}">
					<img src="{{ url('assets/images/empresa_estrella_empty.png') }}">
			</div>
		</div><!--calificacion-->
		<p class="descripcion">Empresa de software y hardware encargada de crear productos de gran innovación.</p>
	</div>
	<div class="empresa_list">
		<div class="calificacion"><!--calificacion-->
		<div class="nombre_empresa"><a href="{{url('datos_empresa')}}">Elektra</a></div>
		<div class="calificacion_empresa">
			<img src="{{ url('assets/images/empresa_estrella_full.png') }}">
			<img src="{{ url('assets/images/empresa_estrella_full.png') }}">
			<img src="{{ url('assets/images/empresa_estrella_empty.png') }}">
			<img src="{{ url('assets/images/empresa_estrella_empty.png') }}">
			<img src="{{ url('assets/images/empresa_estrella_empty.png') }}">
		</div>
	</div><!--calificacion-->
		<p class="descripcion">Empresa de software y hardware encargada de crear productos de gran innovación.</p>
	</div>
</div><!--listado-->


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
</div><!--contenedor-->
@stop
