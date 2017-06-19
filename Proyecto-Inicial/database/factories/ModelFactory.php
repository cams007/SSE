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
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
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
        'pregunta' => $faker->word,
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
        'nombre' => $faker->word,
        'puesto' => $faker->word,
    ];
});
$factory->define(App\Doctorado::class, function (Faker\Generator $faker) {
    return [
        'descripcion' => $faker->word,
        'titulado' => $faker->boolean,
        'preparacion_id' => $faker->randomNumber(),
    ];
});
$factory->define(App\Egresado::class, function (Faker\Generator $faker) {
    return [
        'matricula' => $faker->word,
        'nombre' => $faker->word,
        'curp' => $faker->word,
        'genero' => $faker->randomElement(['Masculino' ,'Femenino']),
        'fecha_nacimiento' => $faker->dateTimeBetween(),
        'nacionalidad' => $faker->randomNumber(),
        'telefono' => $faker->word,
        'lugar_origen' => $faker->word,
        'lugar_actual' => $faker->word,
        'preparacion_id' => function () {
             return factory(App\Preparacion::class)->create()->id;
        },
        'primerEmpleo_id' => function () {
             return factory(App\PrimerEmpleo::class)->create()->id;
        },
    ];
});
$factory->define(App\Empleado::class, function (Faker\Generator $faker) {
    return [
        'carrera' => $faker->randomNumber(),
        'puesto' => $faker->word,
        'antiguedad' => $faker->randomNumber(),
        'unidad_tiempo' => $faker->randomNumber(),
        'carencias_basicas' => $faker->word,
        'conocimientos_actualizados' => $faker->word,
        'carencias_areas' => $faker->word,
        'factores_contratacion' => $faker->word,
        'empleador_id' => $faker->randomNumber(),
    ];
});
$factory->define(App\Empleador::class, function (Faker\Generator $faker) {
    return [
        'nombre' => $faker->word,
        'rfc' => $faker->word,
        'telefono' => $faker->word,
        'correo' => $faker->word,
        'calle' => $faker->word,
        'numero' => $faker->randomNumber(),
        'colonia' => $faker->word,
        'ciudad' => $faker->word,
        'estado' => $faker->word,
        'codigo_postal' => $faker->randomNumber(),
        'motivo_no_contratacion' => $faker->word,
        'recomendaciones' => $faker->word,
        'contacto_id' => function () {
             return factory(App\Contacto::class)->create()->id;
        },
    ];
});
$factory->define(App\Empleo::class, function (Faker\Generator $faker) {
    return [
        'empresa' => $faker->word,
        'puesto_inicial' => $faker->word,
        'puesto_final' => $faker->word,
        'funciones' => $faker->word,
        'antiguedad' => $faker->randomNumber(),
        'unidad_tiempo' => $faker->randomNumber(),
        'egresado_matricula' => $faker->word,
    ];
});
$factory->define(App\Evaluacion::class, function (Faker\Generator $faker) {
    return [
        'evaluacion' => $faker->randomNumber(),
        'empleado_id' => $faker->randomNumber(),
        'catalogoPregunta_id' => $faker->randomNumber(),
        'pregunta_id' => function () {
             return factory(App\CatalogoPregunta::class)->create()->id;
        },
    ];
});
$factory->define(App\EvaluacionPE::class, function (Faker\Generator $faker) {
    return [
        'evaluacion' => $faker->randomNumber(),
        'primerEmpleo_id' => $faker->randomNumber(),
        'catalogoPregunta_id' => $faker->randomNumber(),
        'pregunta_id' => function () {
             return factory(App\CatalogoPregunta::class)->create()->id;
        },
    ];
});
$factory->define(App\Evento::class, function (Faker\Generator $faker) {
    return [
        'nombre' => $faker->word,
        'descripcion' => $faker->word,
        'lugar' => $faker->word,
        'fecha' => $faker->dateTimeBetween(),
        'categoria' => $faker->randomNumber(),
        'imagen' => $faker->word,
        'activo' => $faker->boolean,
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
        'titulo' => $faker->word,
        'descripcion' => $faker->word,
        'imagen' => $faker->word,
        'fecha_publicacion' => $faker->dateTimeBetween(),
        'activo' => $faker->boolean,
    ];
});
$factory->define(App\Maestria::class, function (Faker\Generator $faker) {
    return [
        'descripcion' => $faker->word,
        'titulado' => $faker->boolean,
        'preparacion_id' => $faker->randomNumber(),
    ];
});
$factory->define(App\Oferta::class, function (Faker\Generator $faker) {
    return [
        'titulo_empleo' => $faker->word,
        'descripcion' => $faker->word,
        'carrera' => $faker->randomNumber(),
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
        'carrera' => $faker->randomNumber(),
        'forma_titulacion' => $faker->randomNumber(),
        'fecha_inicio' => $faker->dateTimeBetween(),
        'fecha_fin' => $faker->dateTimeBetween(),
        'fecha_titulo' => $faker->dateTimeBetween(),
        'promedio' => $faker->randomNumber(),
    ];
});
$factory->define(App\PrimerEmpleo::class, function (Faker\Generator $faker) {
    return [
        'tiempo_sin_empleo' => $faker->randomNumber(),
        'empresa' => $faker->word,
        'telefono_empresa' => $faker->word,
        'sector' => $faker->randomNumber(),
        'fecha_ingreso' => $faker->dateTimeBetween(),
        'puesto_inicial' => $faker->word,
        'puesto_final' => $faker->word,
        'jornada' => $faker->randomNumber(),
        'contrato' => $faker->randomNumber(),
        'ingreso' => $faker->randomNumber(),
        'actividad_laboral' => $faker->randomNumber(),
        'factores_contratacion' => $faker->word,
        'carencias_basicas' => $faker->word,
        'carencias_areas' => $faker->word,
        'motivo_no_posgrado' => $faker->word,
        'recomendaciones' => $faker->word,
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
        'titulo' => $faker->word,
        'descripcion' => $faker->word,
        'imagen' => $faker->word,
        'fecha_publicacion' => $faker->dateTimeBetween(),
        'activo' => $faker->boolean,
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