@extends('layouts.master')

@section('title', 'Mis ofertas laborales')

@section('style')
<link href="{{ url('css/perfil.css') }}" rel="stylesheet">
@stop

@section('content')
	<h1>Mi perfil</h1>
	<hr class="hr">
	<div class="clearfix">
		<aside class="column" id="cssmenu">
			@include('partials.aside')
		</aside>
		
		<div class="column content">	
			ofertaslb.blade.php
		</div>
	</div>

@stop