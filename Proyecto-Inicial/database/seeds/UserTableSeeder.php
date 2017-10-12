<?php

use App\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	//Egresados registrados con maestria, doctorado y empleo
        factory(User::class)->times(5)->create([
                'egresado_matricula' => function () {
		            $e = factory(App\Egresado::class)->create([
	             		'preparacion_id' => function () {
				            $p = factory(App\Preparacion::class)->create();
				            factory(App\Maestria::class)->create(['preparacion_id' => $p->id,]);
				            factory(App\Doctorado::class)->create(['preparacion_id' => $p->id,]);
				            return $p->id;
				        },
				    ]);
				    factory(App\Empleo::class)->times(2)->create(['egresado_matricula' => $e->matricula,]);
		            return $e->matricula;
		        },
            ]);

        //Egresados registrados sin maestria, doctorado y empleo
        factory(User::class)->times(5)->create();

        //Se crea egresado de prueba
        factory(User::class)->times(1)->create([
            'correo' => 'usalab@gmail.com',
        ]);

    }
}
