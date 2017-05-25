
@extends('layouts.master')

@section('title', 'Datos basicos')

@section('style')
<link href="{{ url('css/perfil.css') }}" rel="stylesheet">
@stop

@section('content')
	<h1 class="text-center">Mi perfil</h1>
	<hr class="hr">
	<div class="clearfix">
		<aside id="cssmenu" class="column hrV">
			@include('partials.aside')
		</aside>
		
		<div class="column content-sm">
			<form method="POST" action="#">
			
				{{-- TODO: Protección contra CSRF --}}
				{{ csrf_field() }}

				<div>	
					<img src="{{ url('assets/images/user0.png') }}" alt="" class="iconos"> 
					<span> {{" Juan Perez "}} </span>
				</div>

				<div>
					<img src="{{ url('assets/images/birthday.png') }}" alt="" class="iconos"> 
					<span> {{" 27 de octubre de 1985 "}} </span>
				</div>

				<div class="input email">
					<img src="{{ url('assets/images/email.png') }}" alt="" class="iconos"> 
					<label class="link addInput"> Agregar un correo electronico</label>
				</div>

				<div class="input address">
					<img src="{{ url('assets/images/home0.png') }}" alt="" class="iconos"> 
					<label class="link"> Agrega el lugar donde vives actualmente</label>
				</div>

				<div>
					<img src="{{ url('assets/images/address.png') }}" alt="" class="iconos"> 
					<label> {{" Originario de Oaxaca, Oaxaca "}}</label>
				</div>

				<div class="input tel">
					<img src="{{ url('assets/images/phone.png') }}" alt="" class="iconos"> 
					<label class="link"> {{" Agregar telefono"}}</label>
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