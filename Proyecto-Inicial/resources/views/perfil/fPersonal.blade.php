
@extends('layouts.master')

@section('title', 'Formación personal')

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
			<form method="POST" action="#">
			
				{{-- TODO: Protección contra CSRF --}}
				{{ csrf_field() }}

				<div class="form-group">	
					<label for="Carrera"> Carrera</label>
					<input type="text" name="Carrera" id="Carrera" class="form-control">
				</div>

				<div>
					<label> Forma de titulación</label>
					<div class="radio">
						<input type="radio" name="titulacion" id="tesis" value="tesis"> <label for="tesis" class="label-radio">Tesis</label>
						<input type="radio" name="titulacion" id="ceneval" value="ceneval"> <label for="ceneval" class="label-radio">CENEVAL</label>
						<input type="radio" name="titulacion" id="Ntitulado" value="Ntitulado"> <label for="Ntitulado" class="label-radio">No titulado</label>
					</div>
				</div>

				<div class="form-group">
					<label for="finicio"> Fecha de inicio de estudios</label>
					<input type="text" name="finicio" id="finicio" class="form-control">
				</div>

				<div class="form-group">
					<label for="ffinal"> Fecha de fin de estudios</label>
					<input type="text" name="ffinal" id="ffinal" class="form-control">
				</div>

				<div class="form-group">
					<label for="ftitulacion"> Fecha de obtención del título</label>
					<input type="text" name="ftitulacion" id="ftitulacion" class="form-control">
				</div>
			
				<div class="form-group">
					<label for="maestria">Maestría</label>
					<input type="text" name="maestria" id="maestria" class="form-control" pattern="[a-z]" >
				</div>

				<div class="form-group">
					<label>Titulado</label>
					<div class="radio">
						<input type="radio" name="mtitulado" id="tMSi" value="1" > <label for="tMSi" class="label-radio">Sí</label>
						<input type="radio" name="mtitulado" id="tMNo" value="0" > <label for="tMNo" class="label-radio">No</label>
					</div>
				</div>

				<div class="form-group">
					<label for="doctorado">Doctorado</label>
					<input type="text" name="doctorado" id="doctorado" class="form-control" pattern="[a-z]" >
				</div>

				<div class="form-group">
					<label>Titulado</label>
					<div class="radio">
						<input type="radio" name="dtitulado" id="tDSi" value="1">  <label for="tDSi" class="label-radio">Sí</label>	
						<input type="radio" name="dtitulado" id="tDNo" value="0"> <label for="tDNo" class="label-radio">No</label>
					</div>
				</div>

				<div class="form-group text-center">
					<button type="submit" class="flat">Siguiente</button>
				</div>
			</form>
		</div>
	</div>
@stop