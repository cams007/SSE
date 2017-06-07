@extends('layouts.master')

@section('title', 'Experiencia labolar')

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
			<form method="POST">
			
				{{-- TODO: Protección contra CSRF --}}
				{{ csrf_field() }}

				
				<div class="form-group">
					<label for="nEmpresa">Nombre de la empresa</label>
					<input type="text" name="nEmpresa" id="nEmpresa" class="form-control">
				</div>

				<div class="form-group">
					<label>Sector</label>
					<div class="radio">
						<input type="radio" name="sector" id="publica" value="1"> 
						<label for="publica" class="label-radio"> Pública</label>
						
						<input type="radio" name="sector" id="privada" value="0"> 
						<label for="privada" class="label-radio">Privada</label>
						
						<input type="radio" name="sector" id="propia" value="0"> 
						<label for="propia" class="label-radio">Propia</label>
					</div>
				</div>
			
				<div class="form-group">
					<label for="fingreso"> Fecha de ingreso</label>
					<input type="date" name="fingreso" id="fingreso" class="form-control">
				</div>				
			
				<div class="form-group">
					<label for="puestoA"> Puesto actual</label>
					<input type="text" name="puestoA" id="puestoA" class="form-control">
				</div>
			
				<div class="form-group">
					<label for="puestoI">Puesto Inicial</label>
					<input type="text" name="puestoI" id="puestoI" class="form-control" pattern="[a-z]" >
				</div>
			
				<div class="form-group">
					<label for="jornada"> Jornada de trabajo</label>
					<input type="text" name="jornada" id="jornada" class="form-control">
				</div>

				<div>
					<label for="inputTContrato">Tipo de contrato</label>
					<select name="tContrato" id="inputTContrato">
						<option value="" checked>---Selecionar---</option>
						<option value="0">Indeterminado</option>
						<option value="1">Eventual</option>
						<option value="2">Honorarios</option>
					</select>
				</div>
			asasjhs
				<!-- <div class="form-group">
					<label for="">Telefono de la empresa</label>
					<input type="tel" name="eTel" id="inputETel" class="form-control" pattern="[0-1]">
				</div>
			
				<div class="form-group">
					<label for="tContrato">Ingreso mensual</label>
					<select name="tContrato" id="inputTContrato" class="select">
						<option value="" checked>---Selecionar---</option>
						<option value="0"> < a 5000</option>
						<option value="1"> De 5001 a 10000</option>
						<option value="2"> De 10001 a 15000</option>
						<option value="3"> > 15000</option>
					</select>
				</div>
			
				<div class="form-group">
					<label for="tContrato">Sus actividades laborales:</label>
					<select name="tContrato" id="inputTContrato" class="select">
						<option value="" checked>---Selecionar---</option>
						<option value="0"> Requieren de la formación de mi carrera</option>
						<option value="1"> No requieren de la formación de mi carrera</option>
						<option value="2"> No requieren de una profesión</option>
					</select>
				</div> -->

				<div class="form-group text-center">
					<button type="submit" class="flat">
						Siguiente
					</button>
				</div>
			</form>
		</div>
	</div>
@stop