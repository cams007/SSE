@extends('layouts.master')

@section('title', 'Tabulador de salarios')

@section('style')
	<link href="{{ url('css/perfil.css') }}" rel="stylesheet">
@stop

@section('content')
	<h1 class="text-center">Eventos Culturales</h1>
	<hr class="hr">
	<div>
		<aside class="column" id="cssmenu">
			@include('partials.AsideEventosUtm')
		</aside>	
	</div>
@stop