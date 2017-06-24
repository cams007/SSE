<?php

use App\CatalogoValor;
use Illuminate\Database\Seeder;

class CatalogoValorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(CatalogoValor::class)->times(20)->create();
        factory(CatalogoValor::class)->create([
                'descripcion' => 'Otras',
            ]);
    }
}
