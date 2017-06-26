<?php

use App\Empresa;
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
    	// Empresa sin ofertas
        factory(Empresa::class)->times(2)->create();

    	// Empresa con ofertas
        factory(Empresa::class, 20)->create()->each(function ($e) {
        	factory(Oferta::class)->times(5)->create([
        		'empresa_id' => $e->id,
        	]);
	    });
    }
}
