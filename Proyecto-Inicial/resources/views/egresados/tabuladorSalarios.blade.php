@extends('layouts.master')

@section('title', 'Tabulador de salarios')

@section('style')
	<link href="{{ url('css/tabuladorSalarios.css') }}" rel="stylesheet">
	<link href="{{ url('css/paginacion.css') }}" rel="stylesheet">
@stop

@section('content')
<div class="contenedor"><!-- contenedor -->
	<div class="div-1">
		<p class="text-center">Tabulador de salarios</p>
	</div><!--div-1-->

	<div class="div-2"><!--div-2-->
		<div class="div-2-1"><!--div-2-1-->
			<p class="titulo_select">Carrera:</p>
		</div><!--div-2-1-->
		</div><!--div-2-->

		<div class="div-3"><!--div-3-->
		<!-- Filtros -->
			<div class="buscar-salarios">
				{!! Form::open(['url' => 'tabuladorSalarios', 'method' => 'GET', 'role' => 'search']) !!}
				{!! Form::text('q', null, ['type' => 'search', 'name' => 'q', 'placeholder' => 'Buscar']) !!}
			</div>

		<div class="div-3-1">
			{!! Form::select('carrera', config('options.carreras'), null, ['class' => 'seleccion', "onchange" => "this.form.submit()"]) !!}
			{!! Form::close() !!}
		</div><!--div-3-1-->
		<!-- <div class="buscar-salarios">
			{!! Form::open(['url' => 'tabuladorSalarios', 'method' => 'GET', 'role' => 'search']) !!}
				{!! Form::text('q', null, ['type' => 'search', 'name' => 'q', 'placeholder' => 'Buscar']) !!}
		</div> -->
	</div><!--div-3-->
	<div class="se-encontraron">
		<p>Se encontraron {{ $salarios->total() }} resultados</p>
	</div>
	<div class="div-4"><!--div-4-->
		<div class="div-4-1"><!--div-4-1-->
			<table>
				<thead>
					<tr>
					  <th>Título del empleo</th>
					  <th>Carrera</th>
					  <th>Experiencia</th>
					  <th>Monto mínimo</th>
					  <th>Monto máximo</th>
					</tr>
				</thead>

				<tbody>
					@foreach($salarios as $indexKey => $salario)
						<tr>
							<td>{{ $salario->empleo }}</td>
							<td>
								@php
								switch ($salario->carrera) {
									case 0: echo "Ingeniería en Diseño";
											break;
									case 1: echo "Ingeniería en Computación";
											break;
									case 2: echo "Ingeniería en Alimentos";
											break;
									case 3: echo "Ingeniería en Electrónica";
											break;
									case 4: echo "Ingeniería en Mecatrónica";
											break;
									case 5: echo "Ingeniería  Industrial";
											break;
									case 6: echo "Ingeniería en Física Aplicada";
											break;
									case 7: echo "Licenciatura en Ciencias Empresariales";
											break;
									case 8: echo "Licenciatura en Matemáticas Aplicadas";
											break;
									case 9: echo "Licenciatura en Estudios Mexicanos";
											break;
									case 10: echo "Ingeniería en Mecánica Automotriz";
											break;
									default: break;
								}
								@endphp
							</td>
							<td>{{ $salario->experiencia . ' ' . $salario->unidad_tiempo }}</td>
							<td>{{ $salario->monto_minimo }}</td>
							<td>{{ $salario->monto_maximo . ' ' . $salario->unidad_monto }}</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div><!--div-4-1-->
	</div><!--div-4-->

	<div class="div-5"><!--div-5-->
		<!-- Paginación -->
		<div class="paginate">
			@if ( Request::get('q') )
				{!! $salarios->appends(['q' => $_GET["q"]])->render() !!}
			@else
				{!! $salarios->render() !!}
			@endif
		</div>
	</div><!--div-5-->

</div><!--contenedor-->

@stop
