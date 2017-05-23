@extends('layouts.master')

@section('title', 'Mis ofertas laborales')

@section('style')
<link href="{{ url('css/perfil.css') }}" rel="stylesheet">
@stop

@section('content')
	<h1 class="text-center">Mi perfil</h1>
	<hr class="hr">
	<aside class="col-md-3" id="cssmenu">
		@include('partials.aside')
	</aside>
	
	<div class="col-md-6">	
		ofertaslb.blade.php
	</div>


@stop