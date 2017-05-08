@extends('layouts.master')

@section('title', 'Experiencia labolar')

@section('content')
<h1 class="text-center">Mi perfil</h1>
	
	<aside class="col-md-3">
		@include('partials.aside')
	</aside>
	
	<div class="col-md-6">
		<form method="POST">
		
			{{-- TODO: Protección contra CSRF --}}
			{{ csrf_field() }}

			<div class="col-md-6">
				<div class="form-group">
					<label for="nEmpresa">Nombre de la empresa</label>
					<input type="text" name="nEmpresa" id="nEmpresa" class="form-control">
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<p><b>sector</b></p>
					<div class="radio">
						<label class="radio-inline">
							<input type="radio" name="sector" id="" value="1"> Pública
						</label>
						<label class="radio-inline">
							<input type="radio" name="sector" id="" value="0"> Privada
						</label>
						<label class="radio-inline">
							<input type="radio" name="sector" id="" value="0"> Propia
						</label>
					</div>
				</div>
			</div>

			<div class="clearfix"></div>
			
			<div class="col-md-5">
				<div class="form-group">
					<label for="fingreso"> Fecha de ingreso</label>
					<input type="date" name="fingreso" id="fingreso" class="form-control">
				</div>
			</div>
			
			<div class="col-md-7">
				<div class="form-group">
					<label for="puestoA"> Puesto actual</label>
					<input type="text" name="puestoA" id="puestoA" class="form-control">
				</div>
			</div>

			<div class="col-md-6">
				<div class="form-group">
					<label for="puestoI">Puesto Inicial</label>
					<input type="text" name="puestoI" id="puestoI" class="form-control" pattern="[a-z]" >
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label for="jornada"> Jornada de trabajo</label>
					<input type="text" name="jornada" id="jornada" class="form-control">
				</div>
			</div>

			<div class="col-md-6">
				<div class="form-group">
					<label for="tContrato">Tipo de contrato</label>
					<select name="tContrato" id="inputTContrato" class="form-control">
						<option value="" checked>---Selecionar---</option>
						<option value="0">Indeterminado</option>
						<option value="1">Eventual</option>
						<option value="2">Honorarios</option>
					</select>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label for="">Telefono de la empresa</label>
					<input type="tel" name="eTel" id="inputETel" class="form-control" pattern="[0-1]">
				</div>
			</div>

			<div class="col-md-6">
				<div class="form-group">
					<label for="tContrato">Ingreso mensual</label>
					<select name="tContrato" id="inputTContrato" class="form-control">
						<option value="" checked>---Selecionar---</option>
						<option value="0"> < a 5000</option>
						<option value="1"> De 5001 a 10000</option>
						<option value="2"> De 10001 a 15000</option>
						<option value="3"> > 15000</option>
					</select>
				</div>
			</div>

			<div class="col-md-6">
				<div class="form-group">
					<label for="tContrato">Sus actividades laborales:</label>
					<select name="tContrato" id="inputTContrato" class="form-control">
						<option value="" checked>---Selecionar---</option>
						<option value="0"> Requieren de la formación de mi carrera</option>
						<option value="1"> No requieren de la formación de mi carrera</option>
						<option value="2"> No requieren de una profesión</option>
					</select>
				</div>
			</div>

			<div class="form-group text-center">
				<button type="submit" class="btn btn-primary" style="padding:8px 100px;margin-top:25px;">
					Guardar cambios
				</button>
			</div>
		</form>
	</div>
@stop