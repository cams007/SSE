@extends('layouts.master')

@section('title', 'Mis empleos')

@section('style')
	<link href="{{ url('css/perfil.css') }}" rel="stylesheet">
	<link href="{{ url('css/modal.css') }}" rel="stylesheet">
	<link href="{{ url('css/table.css') }}" rel="stylesheet">
	<link href="{{ url('css/notificationflash.css') }}" rel="stylesheet">
@stop

@section('script')
	<script src="{{ url('js/estudiosRealizados.js') }}"></script>
	<script src="{{ url('js/ocultarelemento.js') }}"></script>
@stop

@section('content')
	<div class="contenedor"><!--inicio contenedor-->
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

		<div class="div-1"> <!--incio div-1-->
			<p class="text-center">Mi perfil</p>
		</div><!--fin div-1-->
		
		<div class="div-2"><!--inicio div-2-->
			<div class="div-2-1"><!--inicio div-2-1-->
				<aside id="cssmenu" class="column hrV">
					@include('partials.aside')
				</aside>
			</div>
				<div class="contenedor-info"><!--inicio contenedor-info-->
					<a href="#agregarEmpleo" class="btn-empresa">Agregar empleo</a>

					@if( $empleos->count() == 0 )
						<label>No tiene empleos registrados<label>
					@endif
				</div><!--contenedor-info-->
				
				<div class = "div-4"><!--div-4-->
					@if( $empleos->count() > 0 )
						<label>Tiene {{ $empleos->count() }} empleos registrados<label>
						<table>
							<thead>
								<tr>
									<th>Empresa</th>
									<th>Funciones</th>
									<th>Antig&#252;edad</th>
									<th>Puesto inicial</th>
									<th>Puesto final</th>
								</tr>
							</thead>
							<tbody>
								@foreach( $empleos as $empleo )
									<tr>
										<td>{{ $empleo->empresa }} </td>
										<td>{{ $empleo->funciones }}</td>
										<td>{{ $empleo->antiguedad }} {{ $empleo->unidad_tiempo }}</td>
										<td>{{ $empleo->puesto_inicial }}</td>
										<td>{{ $empleo->puesto_final }}</td>
									</tr>
								@endforeach
							</tbody>
						</table>
					@endif
				</div><!--div-4-->

				<div id="agregarEmpleo" class = "modaloverlay" name = "div-empleo"> <!-- div-modaloverlay -->
					<div class="modal"> <!-- div-modal -->
						<a href="#close" class="close">&times;</a>
						<!-- <div> -->
						<div class="parte-1"><!--parte-1-->
							<p class="txt">Agregar empleo</p>
						</div><!--parte-1-->

						<form action="{{ url('perfil/guardarempleo') }}" method="post" class="agregarEmpleoForm">
							<input name="_token" type="hidden" value="{!! csrf_token() !!}" />	
							
							<div class="form-group">
								<label>Nombre de la empresa</label>
								<input type="text" name="empresa" id="empresa" class="form-control" placeholder="Nombre de la empresa" autofocus required>
							</div>

							<div class="form-group">
								<label>Puesto inicial</label>
								<input type="text" name="puestoi" id="puestoi" class="form-control" placeholder="Puesto inicial" required>
							</div>

							<div class="form-group">
								<label>Puesto final</label>
								<input type="text" name="puestof" id="puestof" class="form-control" placeholder="Puesto final" required>
							</div>

							<div class="form-group">
								<label>Funciones</label>
								<input type="text" name="funciones" id="funciones" class="form-control" placeholder="Funciones" required>
							</div>

							<div class="form-group">
								<label>Antig&#252;edad</label>
								<input type="text" name="antiguedad" id="antiguedad" class="form-control" placeholder="Antig&#252;edad" pattern="[0-9]{1,2}"required>
							</div>
								<div class="agregarEmpleoRadio">
									<input type="radio" name="antiguedadunidad" id="meses" value="meses" checked>
									<label for="meses" class="label-radio"> Meses</label>

									<input type="radio" name="antiguedadunidad" id="anios" value="años">
									<label for="anios" class="label-radio"> Años</label>
								</div>
						

							<div class="btn-group">
								<button type = "submit" class="flat">Guardar</button>
							</div>
						</form>
						<!-- </div> -->
					</div> <!-- div-modal -->
				</div> <!-- div-modaloverlay -->			
			</div><!--fin div-2-1-->		
	</div><!--fin contenedor-->
@stop
