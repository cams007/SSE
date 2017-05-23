
@extends('layouts.master')

@section('title', 'Datos basicos')

@section('style')
<link href="{{ url('css/perfil.css') }}" rel="stylesheet">
@stop

@section('content')
	<h1 class="text-center">Mi perfil</h1>
	<hr class="hr">
	<aside class="col-md-3">
		@include('partials.aside')
	</aside>
	
	<div class="col-md-6">
		<form method="POST" action="#">
		
			{{-- TODO: Protección contra CSRF --}}
			{{ csrf_field() }}

			<div class="form-group">	
				<span class="glyphicon glyphicon-user"> {{"Juan Perez"}}</span> 
			</div>

			<div class="form-group">
				<label for="birthdate"> Fecha de nacimiento</label>
				<div class="input-group">
					<span class="input-group-addon glyphicon glyphicon-calendar"></span>
					<input type="date" name="birthdate" id="birthdate" class="form-control">
				</div>
			</div>

			<div class="form-group">
				<label for="email"> Correo electronico</label>
				<div class="input-group">
					<span class="input-group-addon glyphicon glyphicon-envelope"></span>
					<input type="email" name="email" id="email" class="form-control">
				</div>
			</div>

			<div class="form-group">
				<label for="address"> Direccion actual</label>
				<div class="input-group">
					<span class="input-group-addon glyphicon glyphicon-home"></span>
					<input type="text" name="address" id="address" class="form-control">
				</div>
			</div>

			<div class="form-group">
				<label for="originario">Ciudad de origen</label>
				<div class="input-group">
					<span class="input-group-addon glyphicon glyphicon-asterisk"></span>
					<input type="text" name="originario" id="originario" class="form-control" rows="3">
				</div>
			</div>

			<div class="form-group">
				<label for="phone">Telefono</label>
				<div class="input-group">
					<span class="input-group-addon glyphicon glyphicon-earphone"></span>
					<input type="tel" name="phone" id="phone" class="form-control" rows="3">
				</div>
			</div>

			<div class="form-group text-center">
				<button type="submit" class="btn btn-primary" style="padding:8px 100px;margin-top:25px;">
					Guardar cambios
				</button>
			</div>
		</form>
	</div>
	<div class="col-md-3">
		<div>
            <img src="{{url('assets/images/logo_utm.png')}}" alt="user-picture" class="img-thumbnail  img">
        </div>
	</div>
@stop