
@extends('layouts.master')

@section('title', 'Formación personal')

@section('content')
<h1 class="text-center">Mi perfil</h1>
	
	<aside class="col-md-3">
		@include('partials.aside')
	</aside>
	
	<div class="col-md-6">
		<form method="POST" action="#">
		
			{{-- TODO: Protección contra CSRF --}}
			{{ csrf_field() }}

			<div class="form-group">	
				<label for="Carrera"> Carrera</label>
				<input type="text" name="Carrera" id="Carrera" class="form-control">
			</div>

			<div class="form-group">
					<p> <b>Forma de titulación</b> </p>	
					<label class="radio-inline"><input type="radio" name="titulacion" value="tesis"> Tesis</label>
					<label class="radio-inline"><input type="radio" name="titulacion" value="ceneval"> CENEVAL</label>
					<label class="radio-inline"><input type="radio" name="titulacion" value="Ntitulado"> No titulado</label>
			</div>

			<div class="form-group">
				<label for="finicio"> Fecha de inicio de estudios</label>
				<input type="date" name="finicio" id="finicio" class="form-control">
			</div>

			<div class="form-group">
				<label for="ffinal"> Fecha de fin de estudio</label>
				<input type="date" name="ffinal" id="ffinal" class="form-control">
			</div>

			<div class="form-group">
				<label for="ftitulacion"> Fecha de optención del título</label>
				<input type="date" name="ftitulacion" id="ftitulacion" class="form-control">
			</div>
		
			<div class="col-md-9">
				<div class="form-group">
					<label for="maestria">Maestría</label>
					<input type="text" name="maestria" id="maestria" class="form-control" pattern="[a-z]" >
				</div>
			</div>
			<div class="col-md-3">
				<div class="form-group">
					<p><b>Titulado</b></p>
					<div class="radio">
						<label class="radio-inline">
							<input type="radio" name="mtitulado" id="" value="1" > Si
						</label>
						<label class="radio-inline">
							<input type="radio" name="mtitulado" id="" value="0" > No
						</label>
					</div>
				</div>
			</div>

			<div class="col-md-9">
				<div class="form-group">
					<label for="doctorado">Doctorado en:</label>
					<input type="text" name="doctorado" id="doctorado" class="form-control" pattern="[a-z]" >
				</div>
			</div>
			<div class="col-md-3">
				<div class="form-group">
					<p><b>Titulado</b></p>
					<div class="radio">
						<label class="radio-inline">
							<input type="radio" name="dtitulado" id="" value="1"> Si
						</label>
						<label class="radio-inline">
							<input type="radio" name="dtitulado" id="" value="0"> No
						</label>
					</div>
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