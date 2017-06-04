
@extends('layouts.master')

@section('title', 'Datos basicos')

@section('style')
<link href="{{ url('css/perfil.css') }}" rel="stylesheet">
@stop

@section('content')
	<h1>Mi Perfil</h1>
	<hr class="hr">
	<div class="clearfix">
		<aside id="cssmenu" class="column hrV">
			@include('partials.aside')
		</aside>
		
		<div class="column content-sm">
			<form method="POST" action="#">
			
				{{-- TODO: Protección contra CSRF --}}
				{{ csrf_field() }}

				<div class="label-icon"> 	
					<img src="{{ url('assets/images/user0.png') }}" alt="" class="iconos" /> 
					<span class="aling"> {{" Juan Peréz "}} </span>
				</div>
				
				<div class="label-icon"> 
					<img src="{{ url('assets/images/birthday.png') }}" alt="" class="iconos" /> 
					<span class="aling">{{ "Hombre" }}</span>
				</div>

				<div class="label-icon"> 
					<img src="{{ url('assets/images/birthday.png') }}" alt="" class="iconos" /> 
					<span class="aling"> {{" 27 de octubre de 1985 "}} </span>
				</div>
				<div>
					<input type="email" name="" class="input-icon inputEmail" placeholder="Agregar un correo electrónico" />
				</div>
				<div>
					<input type="text" name="" class="input-icon inputHome" placeholder="Agrega tu ciudad actual" />
				</div>

				<div class="label-icon"> 
					<img src="{{ url('assets/images/address.png') }}" alt="" class="iconos" /> 
					<span class="aling"> {{" Originario de Oaxaca, Oaxaca "}}</span>
				</div>

				<div>
					<input type="tel" class="input-icon inputTel" placeholder="Agregar telefóno"/>
				</div>


				<div class="text-center">
					<button type="button" class="flat">
						Siguiente
					</button>
				</div>
			</form>
		</div>
	
		<div class="column">
	    	<img src="{{url('assets/images/logo_utm.png')}}" alt="user-picture" class="img-thumbnail img">
		</div>
	</div>
@stop

@section('script')
<script src="{{ url('js/perfil.js') }}"></script>
@stop