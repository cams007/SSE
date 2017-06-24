<?php
/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/
/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;
    return [
        'correo' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'egresado_matricula' => function () {
            return factory(App\Egresado::class)->create()->matricula;
        },
        'remember_token' => str_random(10),
    ];
});
$factory->define(App\CatalogoHabilidad::class, function (Faker\Generator $faker) {
    return [
        'descripcion' => $faker->word,
    ];
});
$factory->define(App\CatalogoPregunta::class, function (Faker\Generator $faker) {
    return [
        'pregunta' => $faker->sentence(3),
        'cuestionario' => $faker->boolean,
    ];
});
$factory->define(App\CatalogoValor::class, function (Faker\Generator $faker) {
    return [
        'descripcion' => $faker->word,
    ];
});
$factory->define(App\Contacto::class, function (Faker\Generator $faker) {
    return [
        'nombre' => $faker->name,
        'puesto' => $faker->jobTitle,
    ];
});
$factory->define(App\Doctorado::class, function (Faker\Generator $faker) {
    return [
        'descripcion' => $faker->sentence(3),
        'titulado' => $faker->boolean,
        'preparacion_id' => function () {
             return factory(App\Preparacion::class)->create()->id;
        },
    ];
});
$factory->define(App\Egresado::class, function (Faker\Generator $faker) {
    return [
        'matricula' => $faker->unique()->numerify($string = '##########'),
        'nombre' => $faker->name,
        'curp' => strtoupper($faker->bothify($string = '????######??????##')),
        'genero' => $faker->randomElement(['Masculino' ,'Femenino']),
        'fecha_nacimiento' => $faker->dateTimeBetween(),
        'nacionalidad' => $faker->randomElement(['Mexicana' ,'Otra']),
        'telefono' => $faker->numerify($string = '##########'),
        'lugar_origen' => $faker->city . ', ' . $faker->country,
        'direccion_actual' => $faker->address,
        'imagen' => 'assets/images/egresados/' . $faker->randomElement(['ana.jpg' ,'luis.jpg']),
        'cv' => $faker->sentence,
        'preparacion_id' => function () {
            return factory(App\Preparacion::class)
                ->create()->id;
        },
        'primerEmpleo_id' => function () {
            return factory(App\PrimerEmpleo::class)->create()->id;
        },
    ];
});
$factory->define(App\Empleado::class, function (Faker\Generator $faker) {
    return [
        'carrera' => $faker->numberBetween($min = 0, $max = 10),
        'puesto' => $faker->jobTitle,
        'antiguedad' => $faker->randomNumber(),
        'unidad_tiempo' => $faker->randomElement(['meses' ,'años']),
        'carencias_basicas' => $faker->word,
        'conocimientos_actualizados' => $faker->word,
        'carencias_areas' => $faker->word,
        'factores_contratacion' => $faker->word,
        'empleador_id' => $faker->randomNumber(),
    ];
});
$factory->define(App\Empleador::class, function (Faker\Generator $faker) {
    return [
        'nombre' => $faker->company,
        'rfc' => $faker->word,
        'telefono' => $faker->numerify($string = '##########'),
        'correo' => $faker->unique()->safeEmail,
        'calle' => $faker->streetName,
        'numero' => $faker->randomNumber(),
        'colonia' => $faker->citySuffix,
        'ciudad' => $faker->city,
        'estado' => $faker->country,
        'codigo_postal' => $faker->postcode,
        'motivo_no_contratacion' => $faker->sentence(4),
        'recomendaciones' => $faker->sentence(5),
        'contacto_id' => function () {
             return factory(App\Contacto::class)->create()->id;
        },
    ];
});
$factory->define(App\Empleo::class, function (Faker\Generator $faker) {
    return [
        'empresa' => $faker->company,
        'puesto_inicial' => $faker->jobTitle,
        'puesto_final' => $faker->jobTitle,
        'funciones' => $faker->sentence(5),
        'antiguedad' => $faker->numberBetween($min = 1, $max = 15),
        'unidad_tiempo' => $faker->randomElement(['meses' ,'años']),
        'egresado_matricula' => function () {
             return factory(App\Egresado::class)->create()->matricula;
        },
    ];
});
$factory->define(App\Evaluacion::class, function (Faker\Generator $faker) {
    return [
        'evaluacion' => $faker->randomElement(['Indispensable', 'Deseable', 'Poco indispensable', 'No indispensable']),
        'empleado_id' => function () {
             return factory(App\Empleado::class)->create()->id;
        },
        'catalogoPregunta_id' => function () {
             return factory(App\CatalogoPregunta::class)->create()->id;
        },
    ];
});
$factory->define(App\EvaluacionPE::class, function (Faker\Generator $faker) {
    return [
        'evaluacion' => $faker->randomElement(['Excelente', 'Muy buena', 'Buena', 'Regular', 'Mala']),
        'primerEmpleo_id' => $faker->randomNumber(),
        'catalogoPregunta_id' => $faker->randomNumber(),
        'pregunta_id' => function () {
             return factory(App\CatalogoPregunta::class)->create()->id;
        },
    ];
});
$factory->define(App\Evento::class, function (Faker\Generator $faker) {
    return [
        'nombre' => $faker->sentence(3),
        'descripcion' => $faker->paragraph,
        'lugar' => $faker->address,
        'fecha' => $faker->dateTimeBetween(),
        'categoria' => $faker->randomNumber(),
        'categoria' => $faker->randomElement(['Académico' ,'Cultural']),
        'imagen' => $faker->sentence,
        'activo' => true,
    ];
});
$factory->define(App\Habilidad::class, function (Faker\Generator $faker) {
    return [
        'habilidad' => $faker->word,
        'demostrada' => $faker->boolean,
        'empleado_id' => $faker->randomNumber(),
        'catalogoHabilidad_id' => $faker->randomNumber(),
        'habilidad_id' => function () {
             return factory(App\CatalogoHabilidad::class)->create()->id;
        },
    ];
});
$factory->define(App\HabilidadPE::class, function (Faker\Generator $faker) {
    return [
        'habilidad' => $faker->word,
        'primerEmpleo_id' => $faker->randomNumber(),
        'catalogoHabilidad_id' => $faker->randomNumber(),
        'habilidad_id' => function () {
             return factory(App\CatalogoHabilidad::class)->create()->id;
        },
    ];
});
$factory->define(App\HistoriaExito::class, function (Faker\Generator $faker) {
    return [
        'titulo' => $faker->sentence(3),
        'descripcion' => $faker->paragraph,
        'imagen' => $faker->sentence,
        'activo' => $faker->boolean,
    ];
});
$factory->define(App\Maestria::class, function (Faker\Generator $faker) {
    return [
        'descripcion' => $faker->sentence(4),
        'titulado' => $faker->boolean,
        'preparacion_id' => function () {
             return factory(App\Preparacion::class)->create()->id;
        },
    ];
});
$factory->define(App\Oferta::class, function (Faker\Generator $faker) {
    return [
        'titulo_empleo' => $faker->jobTitle,
        'descripcion' => $faker->sentence(5),
        'carrera' => $faker->numberBetween($min = 0, $max = 10),
        'salario' => $faker->randomNumber(),
        'fecha_publicacion' => $faker->dateTimeBetween(),
        'habilitada' => $faker->boolean,
        'empleador_id' => $faker->randomNumber(),
    ];
});
$factory->define(App\Postulacion::class, function (Faker\Generator $faker) {
    return [
        'egresado_matricula' => $faker->word,
        'oferta_id' => $faker->randomNumber(),
    ];
});
$factory->define(App\Preparacion::class, function (Faker\Generator $faker) {
    return [
        'carrera' => $faker->numberBetween($min = 0, $max = 10),
        'forma_titulacion' => $faker->randomElement(['Tesis' ,'CENEVAL', 'No titulado']),
        'fecha_inicio' => $faker->dateTimeBetween(),
        'fecha_fin' => $faker->dateTimeBetween(),
        'fecha_titulo' => $faker->dateTimeBetween(),
        'promedio' => $faker->randomFloat($nbMaxDecimals = 2, $min = 6, $max = 10),
    ];
});
$factory->state(App\Preparacion::class, 'no_registrado', function ($faker) {
    return [
        'carrera' => $faker->numberBetween($min = 0, $max = 10),
        'forma_titulacion' => null,
        'fecha_inicio' => $faker->dateTimeBetween(),
        'fecha_fin' => $faker->dateTimeBetween(),
        'fecha_titulo' => null,
        'promedio' => $faker->randomFloat($nbMaxDecimals = 2, $min = 6, $max = 10),
    ];
});
$factory->define(App\PrimerEmpleo::class, function (Faker\Generator $faker) {
    return [
        'tiempo_sin_empleo' => $faker->randomElement(['< a 6 meses', 'De 6 a 9 meses', 'De 10 a 12 meses', '> a 1 año', 'No cuento con empleo aún']),
        'empresa' => $faker->company,
        'telefono_empresa' => $faker->numerify($string = '##########'),
        'sector' => $faker->randomElement(['Pública' ,'Privada', 'Propia']),
        'fecha_ingreso' => $faker->dateTimeBetween(),
        'puesto_inicial' => $faker->jobTitle,
        'puesto_final' => $faker->jobTitle,
        'jornada' => $faker->randomElement(['Completo' ,'Medio', 'Horas']),
        'contrato' => $faker->randomElement(['Indeterminado' ,'Eventual', 'Honorarios']),
        'ingreso' => $faker->numberBetween($min = 5000, $max = 50000),
        'actividad_laboral' => $faker->numberBetween($min = 0, $max = 2),
        'factores_contratacion' => $faker->randomElement(['No tener competencias laborales' ,'No estar titulado', 'No acreditar el examen de seleccion', 'Ser egresado de la UTM']) . '%Otras',
        'carencias_basicas' => $faker->sentence(5),
        'carencias_areas' => $faker->sentence(5),
        'motivo_no_posgrado' => $faker->sentence(6),
        'recomendaciones' => $faker->paragraph,
    ];
});
$factory->define(App\Ranking::class, function (Faker\Generator $faker) {
    return [
        'calificacion' => $faker->randomNumber(),
        'comentario' => $faker->word,
        'egresado_matricula' => $faker->word,
        'empleador_id' => $faker->randomNumber(),
    ];
});
$factory->define(App\Tip::class, function (Faker\Generator $faker) {
    return [
        'titulo' => $faker->sentence(3),
        'descripcion' => $faker->paragraph,
        'imagen' => $faker->sentence,
        'activo' => true,
    ];
});
$factory->define(App\Valor::class, function (Faker\Generator $faker) {
    return [
        'valor' => $faker->word,
        'demostrado' => $faker->boolean,
        'empleado_id' => $faker->randomNumber(),
        'catalogoValor_id' => $faker->randomNumber(),
        'valor_id' => function () {
             return factory(App\CatalogoValor::class)->create()->id;
        },
    ];
});
$factory->define(App\ValorPE::class, function (Faker\Generator $faker) {
    return [
        'valor' => $faker->word,
        'primerEmpleo_id' => $faker->randomNumber(),
        'catalogoValor_id' => $faker->randomNumber(),
        'valor_id' => function () {
             return factory(App\CatalogoValor::class)->create()->id;
        },
    ];
});