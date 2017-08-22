@extends('admin.layouts.master')

@section('title', 'index')

@section('style')
	<link href="{{ url('css/paginacion.css') }}" rel="stylesheet">
	<link href="{{ url('css/ranking.css') }}" rel="stylesheet">	
@stop

@section('content')
	<div class="contenedor"><!-- contenedor -->

		<div class="div-1">
			<p class="text-center">&Iacute;ndices y Estad&iacute;sticas</p>
		</div>

<!--
		{!! Form::select('carrera', config('options.carreras'), null, ['class' => 'seleccion', "onchange" => "this.form.submit()"]) !!}
		{!! Form::close() !!}

-->
		<label class="label-egresados" id="label-egresados">Egresados</label>
		<div class="opciones-egresados" id="opciones-egresados">		
			<div>
				{!! Form::select('select-egresado', [
				's1' => 'G&eacute;nero de los encuestados',
				's2' => 'Egresados con empleo',
				's3' => 'Tiempo hasta conseguir primer empleo',
				's4' => 'Dificultades para conseguir empleo',
				's5' => 'Tipo de organismo donde laboran',
				's6' => 'Tiempo de dedicaci&oacute;n al trabajo',
				's7' => 'Tipo de formaci&oacute;n profesional',
				's8' => 'Salario de los empleados',
				's9' => 'Trato en donde estudiaron',
				's10' => 'Satisfacci&oacute;n en la formaci&oacute;n',
				's11' => 'Opini&oacute;n',
				's12' => 'Titulados y no titulados',
				's13' => 'Tiempo para obtener el t&iacute;tulo'] ) !!}

				{!! Form::close() !!}
			</div>
		</div>

		<label class="label-empleadores" id="label-empleadores">Empleadores</label>
		<div class="opciones-empleadores" id="opciones-empleadores">
			<div>
				{!! Form::select('select-empleadores', [
				's1' => 'Carreras m&aacute;s demandadas',
				's2' => 'Opini&oacute;n sobre la formaci&oacute;n',
				's3' => 'Opini&oacute;n sobre el desempeño laboral',
				's4' => 'Importancia del t&iacute;tulo para contratar',
				's5' => 'Importancia de la experiencia laboral',
				's6' => 'Importancia de la imagen de la universidad',
				's7' => 'Confianza de la contrataci&oacute;n de egresados de la universidad'],
				null, [ 'class' => 'select-empleadores', "onchange" => "this.form.submit" ] ) !!}

				{!! Form::close() !!}
			</div>
		</div>

		<!-- Contenedor de grafica -->
		<div id='stocks-chart'></div>

	</div> <!-- Contenedor Principal -->

	<!-- Sript para mostrar el grafico -->
	<?php
	/*
		// Instancia de un Lavacharts
		$lava = new \Khill\Lavacharts\Lavacharts;
		$stocksTable = $lava->DataTable();
		$stocksTable->addDateColumn('Day of Month')
				->addNumberColumn('Projected')
				->addNumberColumn('Official');
	
		for ($a = 1; $a < 6; $a++) {
			$stocksTable->addRow([
				'2015-10-' . $a, rand(800,1000), rand(800,1000)
			]);
		}
		$chart = $lava->ColumnChart('MyStocks', $stocksTable);
		// $chart = Lava::LineChart() if using Laravel
		// echo"<div id='stocks-chart'></div>";
		echo $lava->render('ColumnChart', 'MyStocks', 'stocks-chart');
	*/
	?>
@stop