<?php

use App\Empleador;
use App\Oferta;
use Illuminate\Database\Seeder;

class EmpleadorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	// Empleadores sin ofertas
        factory(Empleador::class)->times(2)->create();

    	// Empleadores con ofertas
        factory(Empleador::class, 10)->create()->each(function ($e) {
        	factory(Oferta::class)->times(3)->create([
        		'empleador_id' => $e->id,
        	]);
	    });
    }
}
