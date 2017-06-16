@extends('layouts.master')

@section('title', 'Datos basicos')

@section('style')
<link href="{{ url('css/perfil.css') }}" rel="stylesheet">
@stop

@section('content')

<div class="contenedor"><!--inicio contenedor-->
	<div class="div-1"><!--inicio div-1-->
		<!-- <p>Mi Perfil</p> -->
		<h1>Mi Perfil</h1>
		<hr class="hr">
	</div><!--fin div-1-->

	<div class="div-2"><!--inicio div-2-->
		<div class="div-2-1"><!--inicio div-2-1-->
			<aside id="cssmenu" class="column hrV">
				@include('partials.aside')
			</aside>
		</div><!--fin div-2-1-->
		<div class="div-2-2"><!--inicio div-2-2-->
			<div class="column content">
				<form method="POST" action="{{url('perfil')}}">

					{{-- TODO: Protección contra CSRF --}}
					{{ csrf_field() }}

					<div class="contenedor-info"><!--inicio contenedor-info-->
						<div class="icono"><!--inicio icono-->
							<img src="{{ url('assets/images/user0.png') }}" alt="" class="iconos">
						</div><!--fin icono-->
						<div class="info"><!--inicio info-->
							<span class="info-perfil"> {{ $egresados->nombre }} </span>
						</div><!--info-->
					</div><!--contenedor-info-->
					<div class="contenedor-info"><!--inicio contenedor-info-->
						<div class="icono"><!--inicio icono-->
							<img src="{{ url('assets/images/birthday.png') }}" alt="" class="iconos">
						</div><!--fin icono-->
						<div class="info"><!--inicio info-->
							<span class="info-perfil"> {{ $egresados->fecha_nacimiento }} </span>
						</div><!--info-->
					</div><!--contenedor-info-->

					<div class="contenedor-info"><!--inicio contenedor-info-->
						<div class="icono"><!--inicio icono-->
							<img src="{{ url('assets/images/address.png') }}" alt="" class="iconos">
						</div><!--fin icono-->
						<div class="info"><!--inicio info-->
							<label class="info-perfil"> {{ $egresados->lugar_origen }}</label>
						</div><!--info-->
					</div><!--contenedor-info-->

					<div>
						<input type="text" name="cActual" class="input-icon inputHome" placeholder="Agrega tu ciudad actual"  value="{{$egresados->lugar_actual}} " />
					</div>
					<div>
						<input type="email" name="egresadosEmail" class="input-icon inputEmail" placeholder="Agregar un correo electrónico" value="{{$egresados->correo}}" />
					</div>

					<div>
						<input type="tel" class="input-icon inputTel" placeholder="Agregar telefóno" value="{{$egresados->telefono}}" />
					</div>

					<div class="text-center">
						<button type="submit" class="flat">
							Siguiente
						</button>
					</div>

				</form>
			</div>
		</div><!--fin div-2-2-->
		<div class="div-2-3">
	    	<img src="{{url('assets/images/logo_utm.png')}}" alt="user-picture" class="img-thumbnail img">
		</div><!--fin div-2-3-->
	</div><!--fin div-2-->
</div><!--fin contenedor-->

@stop

@section('script')
<script src="{{ url('js/perfil.js') }}"></script>
@stop
