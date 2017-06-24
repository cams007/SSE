<?php

use App\HistoriaExito;
use Illuminate\Database\Seeder;

class HistoriaExitoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(HistoriaExito::class)->times(20)->create();
    }
}
