<?php

use App\CatalogoPregunta;
use Illuminate\Database\Seeder;

class CatalogoPreguntaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Preguntas para egresados
        factory(CatalogoPregunta::class, 10)->create([
                'cuestionario' => true,
            ]);
        // Preguntas para empresas
        factory(CatalogoPregunta::class, 5)->create([
                'cuestionario' => false,
            ]);
    }
}
