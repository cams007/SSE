@extends('layouts.master')

@section('title', 'Datos basicos')

@section('style')
<link href="{{ url('css/perfil.css') }}" rel="stylesheet">
<link href="{{ url('css/empresa.css') }}" rel="stylesheet">

@stop

@section('content')
	<h1 class="text-center">Datos de empresa</h1>
	<hr class="hr">

	<div class="clearfix">
		<aside id="cssmenu" class="column hrV">
			@include('partials.asideEmpresa')
		</aside>
		
		<div class="column content-sm">
			<form method="POST" action="#">
			
				{{-- TODO: Protección contra CSRF --}}
				{{ csrf_field() }}

				<div>	
					<img src="{{ url('assets/images/address.png') }}" alt="" class="iconos"> 
					<span> {{" Apple Inc. "}} </span>
				</div>

				<div>
					<img src="{{ url('assets/images/home0.png') }}" alt="" class="iconos"> 
					<span> {{" Cupertino, California, Estados Unidos "}} </span>
				</div>

				<div>
					<img src="{{ url('assets/images/phone.png') }}" alt="" class="iconos"> 
					<span> {{" 1-800-275-2273 "}} </span>
				</div>

				<div>
					<img src="{{ url('assets/images/email.png') }}" alt="" class="iconos"> 
					<span> {{" info@apple.com "}} </span>
				</div>

				<div>
					<img src="{{ url('assets/images/user0.png') }}" alt="" class="iconos"> 
					<span> {{" Tim Cook "}} </span>
				</div>

				<div>
					<img src="{{ url('assets/images/empresa_puesto.png') }}" alt="" class="iconos"> 
					<span> {{" CEO "}} </span>
				</div>
				
			</form>
		</div>
	
		<div class="column">
	    	<img src="{{url('assets/images/logo_utm.png')}}" alt="user-picture" class="img-thumbnail img">
	    	<!-- <div>
	    		<br>
	    		<h3>3.2</h3>
		    	<img src="{{ url('assets/images/empresa_estrella_full.png') }}">
				<img src="{{ url('assets/images/empresa_estrella_full.png') }}">
				<img src="{{ url('assets/images/empresa_estrella_full.png') }}">
				<img src="{{ url('assets/images/empresa_estrella_full.png') }}">
				<img src="{{ url('assets/images/empresa_estrella_empty.png') }}">
				<h6>12 comentarios</h6>
			</div> -->
			<div>
				<img src="{{ url('assets/images/empresa_estrella.png') }}" alt="" class="iconos"> 
				<a href="#calificaEmpresa">Calificar empresa</a>
			</div>
		</div>
	</div>


	<div id="calificaEmpresa" class="modaloverlay">
	  	<div class="modal">
		    <a href="#close" class="close">&times;</a>
		    <div>
		    	<h1>Calificar esta empresa</h1>
		    	<form action="#">
					<div>
						<br><br>
						<img src="{{ url('assets/images/empresa_estrella.png') }}" alt="" class="iconos">
						<img src="{{ url('assets/images/empresa_estrella.png') }}" alt="" class="iconos">
						<img src="{{ url('assets/images/empresa_estrella.png') }}" alt="" class="iconos">
						<img src="{{ url('assets/images/empresa_estrella.png') }}" alt="" class="iconos">
						<img src="{{ url('assets/images/empresa_estrella.png') }}" alt="" class="iconos">
					</div>
					<div>
						<textarea name="" id="comentario" class="form-control" rows="3"></textarea>
					</div>

					<div class="btn-group">
						<button type="button" class="flat-secundario">Cancelar</button>
						<button type="button" class="flat aling-right">Guardar</button>
					</div>
		    	</form>
		    </div>
		</div>
	</div>
@stop