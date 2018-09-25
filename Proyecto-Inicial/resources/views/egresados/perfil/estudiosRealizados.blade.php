
@extends('layouts.master')

@section('title', 'Estudios realizados')

@section('style')
	<link href="{{ url('css/perfil.css') }}" rel="stylesheet">
@stop

@php
	$carrera = array(
		0 => 'Ingeniería en Diseño',
		1 => 'Ingeniería en Computación',
		2 => 'Ingeniría en Alimentos',
		3 => 'Ingeniería en Electrónica',
		4 => 'Ingeniería en Mecatrónica',
		5 => 'Ingeniería Industrial',
		6 => 'Ingeniería en Física Aplicada',
		7 => 'Licenciatura en Ciencias Empresariales',
		8 => 'Licenciatura en Matemáticas Aplicadas',
		9 => 'Licenciatura en Estudios Mexicanos',
		10 => 'Ingeniería en Mecánica Automotriz'
	);

	$maestria_titulacion = array(
		0 => 'No',
		1 => 'Si',
	);
@endphp

@section('script')
	<script src="{{ url('js/estudiosRealizados.js') }}"></script>
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
				<div class="form-group">	
					<label for="Carrera">Carrera</label>
					<label style = "color: red;">{{ $carrera[ $preparacion->carrera ] }}</label>
				</div>

				<div class="form-group">
					<label for="finicio">Fecha de inicio de estudios</label>
					<label style = "color: red;">{{ $preparacion->fecha_inicio }}</label>
				</div>

				<div class="form-group">
					<label for="ffinal">Fecha de fin de estudios</label>
					<label style = "color: red;">{{ $preparacion->fecha_fin }}</label>
				</div>

				<div class="form-group">
					<label for="ffinal">Promedio general</label>
					<label style = "color: red;">{{ $preparacion->promedio }}</label>
				</div>

				<!-- Si el usuario ya selecciono su forma de titulacion -->
				@if( $preparacion->forma_titulacion != NULL  )
					<hr>
					@if( $preparacion->forma_titulacion != "No titulado" )
						<div class="form-group">
							<label for="ffinal">Forma de titulación</label>
							<label style = "color: red;">{{ $preparacion->forma_titulacion }}</label>
						</div>

						<div class="form-group">
							<label for="ffinal">Fecha de titulación</label>
							<label style = "color: red;">{{ $preparacion->fecha_titulo }}</label>
						</div>
					<!-- Si el estatus de titulacion del egresado es "No titulado" -->
					@else
						<div class="form-group">
							<label for="ffinal">Forma titulación</label>
							<label style = "color: red;">{{ $preparacion->forma_titulacion }}</label>
							<a href="#" class="btn-titulacion" onclick = "showElement()">Actualizar</a>
						</div>
					@endif

					<!-- Si el egresado cambia de "No titulado" por alguna forma de titulacion -->
					<div id = "hide_element" style = "display:none;">
						<form method="POST" action="{{url('perfil/guardarFormacion')}}">
							{{-- TODO: Protección contra CSRF --}}
							{{ csrf_field() }}
							<div>
								<label> Forma de titulación</label>
								<div class="radio">
									<input type="radio" name="titulacion" id="tesis" value="tesis"> <label for="tesis" class="label-radio">Tesis</label>
									<input type="radio" name="titulacion" id="ceneval" value="ceneval"> <label for="ceneval" class="label-radio">CENEVAL</label>
									<input type="radio" name="titulacion" id="Ntitulado" value="No titulado"> <label for="Ntitulado" class="label-radio">No titulado</label>
								</div>
							</div>
						
							<div class="form-group">
								<label for="ftitulacion">Fecha de titulación</label>
								{{-- <input type="text" name="ftitulacion" id="ftitulacion" class="form-control"> --}}
								{!! Form::date( 'ftitulacion', \Carbon\Carbon::now() ) !!}
							</div>
							<div class="form-group text-center">
								<button type="submit" class="flat">Guardar</button>
							</div>
						</form>
					</div>

				@else
					<hr>
					<form method="POST" action="{{url('perfil/guardarFormacion')}}">
						{{-- TODO: Protección contra CSRF --}}
						{{ csrf_field() }}

						@if( $preparacion->forma_titulacion == NULL )
							<div>
								<label> Forma de titulación</label>
								<div class="radio">
									<input type="radio" name="titulacion" id="tesis" value="tesis"> <label for="tesis" class="label-radio">Tesis</label>
									<input type="radio" name="titulacion" id="ceneval" value="ceneval"> <label for="ceneval" class="label-radio">CENEVAL</label>
									<input type="radio" name="titulacion" id="Ntitulado" value="No titulado"> <label for="Ntitulado" class="label-radio">No titulado</label>
								</div>
							</div>
						
							<div class="form-group">
								<label for="ftitulacion">Fecha de titulación</label>
								{{-- <input type="text" name="ftitulacion" id="ftitulacion" class="form-control"> --}}
								{!! Form::date( 'ftitulacion', \Carbon\Carbon::now() ) !!}
							</div>
						@endif

						<div class="form-group text-center">
							<button type="submit" class="flat">Guardar</button>
						</div>
					</form>
				@endif

				<form method="POST" action="{{url('perfil/estudiosRealizados')}}">
					{{-- TODO: Protección contra CSRF --}}
					{{ csrf_field() }}

					<br><br>
					<hr>
					<br>

					<div class="form-group">
						<label for="maestria">Maestría(s)</label>
					</div>
					
					@if( $preparacion->maestrias->count() > 0)
						<table>
							<thead>
								<tr>
									<th>Descripcion</th>
									<th>Titulado</th>
								</tr>
							</thead>
							@foreach( $preparacion->maestrias as $maestria )
								<tbody>
									<tr>
										<td>{{ $maestria->descripcion }}</td>
										<td>{{ $maestria_titulacion[ $maestria->titulado ] }}</td>
									</tr>
								</tbody>
							@endforeach
						</table>
					@endif

					<input type="text" name="maestria" id="maestria" class="form-control" pattern = "[A-Za-z]{2, 100}"/>
					<label>Titulado</label>
					<div class="radio">
						<input type="radio" name="mtitulado" id="tMSi" value="1" > <label for="tMSi" class="label-radio">Sí</label>
						<input type="radio" name="mtitulado" id="tMNo" value="0" > <label for="tMNo" class="label-radio">No</label>
					</div>

					<br><br>
					<hr>
					<br>
					<div class="form-group">
						<label for="doctorado">Doctorado</label>
						<input type="text" name="doctorado" id="doctorado" class="form-control" pattern = "[A-Za-z]{2, 100}" >
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
	</div><!--fin contenedor-->
@stop
