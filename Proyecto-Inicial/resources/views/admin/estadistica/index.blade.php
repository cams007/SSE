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

		<!-- Titulo de la consulta -->
		<div class="div-1">
			<p class="text-center">T&iacute;tulo de la consulta</p>
		</div>

		<!-- Contenedor de grafica -->
		<div id='stocks-chart'></div>

	</div> <!-- Contenedor Principal -->

	<!-- Sript para mostrar el grafico -->
	<?php

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
	?>
@stop