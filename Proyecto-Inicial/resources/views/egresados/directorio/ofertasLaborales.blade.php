@extends('layouts.master')

@section('title', 'Datos basicos')

@section('style')
<link href="{{ url('css/perfil.css') }}" rel="stylesheet">
<link href="{{ url('css/ofertas.css') }}" rel="stylesheet">
<link href="{{ url('css/empresa.css') }}" rel="stylesheet">
@stop

@section('content')
<div class="contenedor"><!--inicio contenedor-->

	<div class="div-1"><!--inicio div-1-->
		<h1>Datos de empresa</h1>
		<hr class="hr">
	</div><!--fin div-1-->

	<div class="clearfix">
		
		<div class="div-2-1"><!--inicio div-2-1-->
			<aside id="cssmenu" class="column hrV">
				@include('partials.asideEmpresa')
			</aside>
		</div><!--fin div-2-1-->
		
		<div class="column content">
				
				Ofertas laborales

		</div>
	
	</div>
</div><!--fin contenedor-->
@stop