
@extends('layouts.master')

@section('title', 'Mis estudios')

@section('style')
	<link href="{{ url('css/perfil.css') }}" rel="stylesheet">
	<link href="{{ url('css/modal.css') }}" rel="stylesheet">
	<link href="{{ url('css/notificationflash.css') }}" rel="stylesheet">
@stop

@section('script')
	<script src="{{ url('js/estudiosRealizados.js') }}"></script>
	<script src="{{ url('js/ocultarelemento.js') }}"></script>
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

@section('content')
	<div class="contenedor"><!--inicio contenedor-->
		<!-- Muestra un mensaje de alerta en caso de que el usuario no se puede registrar -->
		@if(Session::has('message_success'))
			<div class = "alert alert-success flashmensasse" id = "message_alert">
				<em> {!! session('message_success') !!}</em>
				<button id = "hide" type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			</div>
		@endif

		@if(Session::has('message_danger'))
			<div class = "alert alert-danger flashmensasse" id = "message_alert">
				<em> {!! session('message_danger') !!}</em>
				<button id = "hide" type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			</div>
		@endif

		<div class="div-1"><!--inicio div-1-->
			<p class="text-center">Mi perfil</p>
		</div><!--fin div-1-->

		<div class="clearfix">
			<div class="div-2"><!--inicio div-2-->
				<div class="div-2-1"><!--inicio div-2-1-->
				<aside id="cssmenu" class="column hrV">
					@include('partials.aside')
				</aside>
			</div><!--fin div-2-1-->
			
			<div class="column content">
				<div class="form-group-estudios">	
					<label for="Carrera">Carrera:</label>
					<label>{{ $carrera[ $preparacion->carrera ] }}</label>
				</div>

				<div class="form-group-estudios">
					<label for="finicio">Fecha de inicio de estudios:</label>
					<label>{{ $preparacion->fecha_inicio }}</label>
				</div>

				<div class="form-group-estudios">
					<label for="ffinal">Fecha de fin de estudios:</label>
					<label>{{ $preparacion->fecha_fin }}</label>
				</div>

				<div class="form-group-estudios">
					<label for="ffinal">Promedio general:</label>
					<label>{{ $preparacion->promedio }}</label>
				</div>

				<!-- Si el usuario ya selecciono su forma de titulacion -->
				@if( $preparacion->forma_titulacion != NULL  )					
					@if( $preparacion->forma_titulacion != "No titulado" )
						<div class="form-group-estudios">
							<label for="ffinal">Forma de titulación:</label>
							<label>{{ $preparacion->forma_titulacion }}</label>
						</div>

						<div class="form-group-estudios">
							<label for="ffinal">Fecha de titulación:</label>
							<label>{{ $preparacion->fecha_titulo }}</label>
						</div>
					<!-- Si el estatus de titulacion del egresado es "No titulado" -->
					@else
						<div class="form-group-estudios">
							<label for="ffinal">Forma titulación:</label>
							<label>{{ $preparacion->forma_titulacion }}</label>
							<a href="#" class="btn-titulacion" onclick = "showElement()">Actualizar</a>
						</div>
					@endif

					<!-- Si el egresado cambia de "No titulado" por alguna forma de titulacion -->
					<div id = "hide_element" style = "display:none;">
						<form method="POST" action="{{url('perfil/guardarFormacion')}}">
							{{ csrf_field() }}
							<div>
								<label> Forma de titulación:</label>
								<div class="radio">
									<input type="radio" name="titulacion" id="tesis" value="Tesis"> <label for="tesis" class="label-radio">Tesis</label>
									<input type="radio" name="titulacion" id="ceneval" value="CENEVAL"> <label for="ceneval" class="label-radio">CENEVAL</label>
									<input type="radio" name="titulacion" id="Ntitulado" value="No titulado"> <label for="Ntitulado" class="label-radio">No titulado</label>
								</div>
							</div>
						
							<div class="form-group-estudios">
								<label for="ftitulacion">Fecha de titulación:</label>
								{{-- <input type="text" name="ftitulacion" id="ftitulacion" class="form-control"> --}}
								{!! Form::date( 'ftitulacion', \Carbon\Carbon::now() ) !!}
							</div>
							<div class="form-group text-center">
								<button type="submit" class="flat">Guardar</button>
							</div>
						</form>
					</div>

				@else				
					<form method="POST" action="{{url('perfil/guardarFormacion')}}">
						{{ csrf_field() }}

						@if( $preparacion->forma_titulacion == NULL )
							<div>
								<label> Forma de titulación:</label>
								<div class="radio">
									<input type="radio" name="titulacion" id="tesis" value="tesis"> <label for="tesis" class="label-radio">Tesis</label>
									<input type="radio" name="titulacion" id="ceneval" value="ceneval"> <label for="ceneval" class="label-radio">CENEVAL</label>
									<input type="radio" name="titulacion" id="Ntitulado" value="No titulado"> <label for="Ntitulado" class="label-radio">No titulado</label>
								</div>
							</div>
						
							<div class="form-group">
								<label for="ftitulacion">Fecha de titulación:</label>
								{{-- <input type="text" name="ftitulacion" id="ftitulacion" class="form-control"> --}}
								{!! Form::date( 'ftitulacion', \Carbon\Carbon::now() ) !!}
							</div>
						@endif

						<div class="form-group text-center">
							<button type="submit" class="flat">Guardar</button>
						</div>
					</form>
				@endif

				<div>
					<br><br>					
					<br>

					<div class="form-group-estudios">
						<label for="maestria">Maestría(s)</label>					
					
					@if( $preparacion->maestrias->count() > 0)
						<table>
							<thead>
								<tr>
									<th>Descripción</th>
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
					@else
						<label>No tiene maestrías registradas</label>
					@endif
					</div>

					<div class="btn"><!--inicio contenedor-info-->
						<a href="#agregarMaestria" class="btn-empresa">Agregar maestría</a>
					</div><!--contenedor-info-->

					<div class="form-group-estudios">
						<label for="doctorado">Doctorado(s)</label>					
					
					@if( $preparacion->doctorados->count() > 0)
						<table>
							<thead>
								<tr>
									<th>Descripción</th>
									<th>Titulado</th>
								</tr>
							</thead>
							@foreach( $preparacion->doctorados as $doctorado )
								<tbody>
									<tr>
										<td>{{ $doctorado->descripcion }}</td>
										<td>{{ $maestria_titulacion[ $doctorado->titulado ] }}</td>
									</tr>
								</tbody>
							@endforeach
						</table>
					@else
						<label>No tiene doctorados registrados</label>
					@endif
					</div>
					<div class="btn"><!--inicio contenedor-info-->
						<a href="#agregarDoctorado" class="btn-empresa">Agregar doctorado</a>
					</div><!--contenedor-info-->
				</div>
			</div>
		</div>

		<!-- Modal para agregar DOCTORADO -->
		<div id="agregarDoctorado" class = "modaloverlay" name = "div-doctorado"> <!-- div-modaloverlay -->
			<div class="modal"> <!-- div-modal -->
				<a href="#close" class="close">&times;</a>
				<!-- <div> -->
				<div class="parte-1"><!--parte-1-->
					<p class="txt">Agregar doctorado</p>
				</div><!--parte-1-->

				<form action="{{ url('perfil/guardardoctorado') }}" method="post">
					<input name="_token" type="hidden" value="{!! csrf_token() !!}" />	
					
					<input type="text" name="agregardoctorado" id="agregardoctorado" class = "form-control" placeholder = "Titulo del doctorado" required/><br>
					<label>Titulado</label>
					
					<div class="agregar-maestria-radio">
						<input type="radio" name="sector" id="publica" value="1" checked>
						<label for="publica" class="label-radio"> Sí</label>

						<input type="radio" name="sector" id="privada" value="0">
						<label for="privada" class="label-radio"> No</label>
					</div>

					<div class="botones-doctorado">
						<a href="#close"><button type="button" class="flat-secundario">Cancelar</button></a>
						<button type = "submit" class="flat aling-right">Guardar</button>
					</div>
				</form>
				<!-- </div> -->
			</div> <!-- div-modal -->
		</div> <!-- div-modaloverlay -->

	</div><!--fin contenedor-->

	<!-- Modal para agregar MAESTRIA -->
		<div id="agregarMaestria" class="modaloverlay" name = "div-maestria"> <!-- div-modaloverlay -->
			<div class="modal"> <!-- div-modal -->
				<a href="#close" class="close">&times;</a>
				<!-- <div> -->
				<div class="parte-1"><!--parte-1-->
					<p class="txt">Agregar maestría</p>
				</div><!--parte-1-->

				<form action="{{ url('perfil/guardarmaestria') }}" method="post">
					<input name="_token" type="hidden" value="{!! csrf_token() !!}" />	
					
					<input type="text" name="agregarmaestria" id="agregarmaestria" class = "form-control" placeholder = "Titulo de la maestría" required/><br>
					<label>Titulado:</label>
					
					<div class="agregar-maestria-radio">
						<input type="radio" name="sector1" id="publica1" value="1" checked>
						<label for="publica1" class="label-radio"> Sí</label>

						<input type="radio" name="sector1" id="privada1" value="0">
						<label for="privada1" class="label-radio"> No</label>
					</div>
					
					<div class="botones-maestria">
						<a href="#close"><button type="button" class="flat-secundario">Cancelar</button></a>
						<button type = "submit" class="flat aling-right">Guardar</button>
					</div>
				</form>
				<!-- </div> -->
			</div> <!-- div-modal -->
		</div> <!-- div-modaloverlay -->
@stop
