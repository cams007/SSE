<?php

use App\CatalogoHabilidad;
use Illuminate\Database\Seeder;

class CatalogoHabilidadTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(CatalogoHabilidad::class)->times(20)->create();
        factory(CatalogoHabilidad::class)->create([
                'descripcion' => 'Otras',
            ]);
    }
}
