<?php

use App\Ranking;
use App\Egresado;
use Illuminate\Database\Seeder;

class RankingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    	$egresados = Egresado::where('nacionalidad', '<>', null)->take(20)->get();

    	foreach($egresados as $value) {
    		for ($i = 1; $i <= 15; $i++) {

		        factory(Ranking::class)->create([
		        	'egresado_matricula' => $value->matricula,
		        	'empresa_id' => $i,
		        ]);

	    	}
    	}

    }
}
