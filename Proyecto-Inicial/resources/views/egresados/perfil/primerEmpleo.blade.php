@extends('layouts.master')

@section('title', 'Mi primer empleo')

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
			<form method="POST" action="{{url('perfil/primerEmpleo')}}">
			
				{{-- TODO: Protección contra CSRF --}}
				{{ csrf_field() }}

				
				<div class="form-group">
					<label for="nEmpresa">Nombre de la empresa</label>
					<input type="text" name="nEmpresa" id="nEmpresa" class="form-control" value="{{ $empleo->empresa }}">
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
					<input type="date" name="fingreso" id="fingreso" class="form-control" value="{{ $empleo->fecha_ingreso }}">
					{{-- {{ Form::date('fingreso', $empleo->fecha_ingreso ) }} --}}
				</div>				
			
				<div class="form-group">
					<label for="puestoA"> Puesto actual</label>
					<input type="text" name="puestoA" id="puestoA" class="form-control" value="{{ $empleo->puesto_inicial }}">
				</div>
			
				<div class="form-group">
					<label for="puestoI">Puesto final</label>
					<input type="text" name="puestoI" id="puestoI" class="form-control" pattern="[a-z]" value="{{ $empleo->puesto_final }}">
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
			
				<!-- <div class="form-group">
					<label for="">Telefono de la empresa</label>
					<input type="tel" name="eTel" id="inputETel" class="form-control" pattern="[0-1]">
				</div>
			
				<div class="form-group">
					<label for="tContrato">Ingreso mensual</label>
					<select name="tContrato" id="inputTContrato" class="select">
						<option value="" checked>-Selecionar-</option>
						<option value="0"> < a 5000</option>
						<option value="1"> De 5001 a 10000</option>
						<option value="2"> De 10001 a 15000</option>
						<option value="3"> > 15000</option>
					</select>
				</div>
			
				<div class="form-group">
					<label for="tContrato">Sus actividades laborales:</label>
					<select name="tContrato" id="inputTContrato" class="select">
						<option value="" checked>-Selecionar-</option>
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
</div><!--fin contenedor-->
@stop