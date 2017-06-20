<?php

use App\Egresado;
use Illuminate\Database\Seeder;

class EgresadoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Egresado::class)->times(5)->create();
    }
}
