@extends('layouts.master')

@section('title', 'Mis ofertas laborales')

@section('style')
<link href="{{ url('css/perfil.css') }}" rel="stylesheet">
@stop

@section('content')
<div class="contenedor"><!--inicio contenedor-->
	<div class="div-1"><!--inicio div-1-->
		<!-- <p>Mi Perfil</p> -->
		<h1>Mi perfil</h1>
		<hr class="hr">
	</div><!--fin div-1-->
	
	<div class="clearfix">
		
		<div class="div-2"><!--inicio div-2-->
			<div class="div-2-1"><!--inicio div-2-1-->
			<aside id="cssmenu" class="column hrV">
				@include('partials.aside')
			</aside>
		</div><!--fin div-2-1-->
		
		<div class="column content">	
			ofertaslb.blade.php
		</div>
	</div>
</div><!--fin contenedor-->
@stop