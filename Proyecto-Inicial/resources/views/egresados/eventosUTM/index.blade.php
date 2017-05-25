@extends('layouts.master')

@section('title', 'Eventos UTM')

@section('style')
	<link href="{{ url('css/perfil.css') }}" rel="stylesheet">
@stop

@section('content')
	<h1 class="text-center">Eventos UTM</h1>
	<hr class="hr">
	<div class="clearfix">
		<aside class="column" id="cssmenu">
			@include('partials.AsideEventosUtm')	
		</aside>

		
	</div>

@stop