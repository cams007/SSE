<?php

use App\Tabulador;
use Illuminate\Database\Seeder;

class TabuladorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Tabulador::class)->times(15)->create();
    }
}
