<?php
	// Lava::DataTable() ; if using Laravel
	$lava = new \Khill\Lavacharts\Lavacharts;
	$stocksTable = $lava->DataTable();

	$stocksTable->addDateColumn('Day of Month')
			->addNumberColumn('Projected')
			->addNumberColumn('Official');
	
	for ($a = 1; $a < 5; $a++) {
		$stocksTable->addRow([
			'2015-10-' . $a, rand(800,1000), rand(800,1000)
		]);
	}
	$chart = $lava->LineChart('MyStocks', $stocksTable);
	// $chart = Lava::LineChart() if using Laravel
	echo"<div id='stocks-chart'></div>";
	echo $lava->render('LineChart', 'MyStocks', 'stocks-chart');
?>