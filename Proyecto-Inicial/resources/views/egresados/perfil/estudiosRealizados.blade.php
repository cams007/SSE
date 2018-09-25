
@extends('layouts.master')

@section('title', 'Estudios realizados')

@section('style')
<link href="{{ url('css/perfil.css') }}" rel="stylesheet">
@stop

@section('content')
<div class="contenedor"><!--inicio contenedor-->
	<div class="div-1"> <!--incio div-1-->
		<p class="text-center">Mi perfil</p>
	</div><!--fin div-1-->

	<div class="clearfix">

		<div class="div-2"><!--inicio div-2-->
			<div class="div-2-1"><!--inicio div-2-1-->
			<aside id="cssmenu" class="column hrV">
				@include('partials.aside')
			</aside>
		</div><!--fin div-2-1-->

		<div class="column content content-lg">
			<form method="POST" action="{{url('perfil/estudiosRealizados')}}">

				{{-- TODO: Protección contra CSRF --}}
				{{ csrf_field() }}

				<div class="form-group">
					<label for="Carrera"> Carrera</label>
					{!! Form::select('carrera', config('options.carreras'), $preparacion->carrera, ['class' => 'seleccion', 'disabled']) !!}
				</div>

				<div class="form-group">
					<label for="finicio"> Fecha de inicio de estudios</label>
					<input type="text" name="finicio" id="finicio" class="form-control" value="{{ $preparacion->fecha_inicio }}" readonly>
				</div>

				<div class="form-group">
					<label for="ffinal"> Fecha de fin de estudios</label>
					<input type="text" name="ffinal" id="ffinal" class="form-control" value="{{ $preparacion->fecha_fin }}" readonly>
				</div>

				<div>
					<label> Forma de titulación</label>
					<div class="radio">
						<input type="radio" name="titulacion" id="tesis" value="tesis"> <label for="tesis" class="label-radio">Tesis</label>
						<input type="radio" name="titulacion" id="ceneval" value="ceneval"> <label for="ceneval" class="label-radio">CENEVAL</label>
						<input type="radio" name="titulacion" id="Ntitulado" value="Ntitulado"> <label for="Ntitulado" class="label-radio">No titulado</label>
					</div>
				</div>

				<div class="form-group">
					<label for="ftitulacion"> Fecha de obtención del título</label>
					{{-- <input type="text" name="ftitulacion" id="ftitulacion" class="form-control"> --}}
					{!! Form::date('ftitulacion', \Carbon\Carbon::now()) !!}
				</div>

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

							@foreach($preparacion->maestrias as $maestria)
								<tbody>
									<tr>
										<td>{{ $maestria->descripcion }}</td>
										<td>Si</td>
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
