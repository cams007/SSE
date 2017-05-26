@extends('layouts.master')

@section('title', 'Mis intereses')

@section('style')
<link href="{{ url('css/perfil.css') }}" rel="stylesheet">
@stop

@section('content')
	<h1 class="text-center">Mi perfil</h1>
	<hr class="hr">
	<div class="clearfix">
		<aside class="column" id="cssmenu">
			@include('partials.aside')
		</aside>
		
		<div class="column content">	
			<div class="form-group">
				<label for="doctorado">¿Que recomendarias mejorar en cada una de las opciones que calificaste como regular o malo?</label>
				<textarea name="" id="input" class="form-control" rows="3" required="required"></textarea>
			</div>
		</div>
		
	</div>

@stop