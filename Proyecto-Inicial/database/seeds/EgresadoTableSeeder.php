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
    	// Egresados registrados en UserTableSeeder.php

        // Egresados no registrados
    	factory(Egresado::class)->times(5)->create([
                'nacionalidad' => null,
                'telefono' => null,
                'direccion_actual' => null,
                'imagen_url' => null,
                'cv_url' => null,
                'preparacion_id' => function () {
		             return factory(App\Preparacion::class)->create([
		             		'forma_titulacion' => null,
		             		'fecha_titulo' => null,
		             	])->id;
		        },
                'primer_empleo_id' => null,
            ]);
    }
}
