<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrimerEmpleoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('PrimerEmpleo', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->enum('tiempo_sin_empleo', ['< a 6 meses', 'De 6 a 9 meses', 'De 10 a 12 meses', '> a 1 año', 'No cuento con empleo aún']);
            $table->string('empresa', 100)->nullable();
            $table->string('telefono_empresa', 12)->nullable();
            $table->enum('sector', ['Pública', 'Privada', 'Propia'])->nullable();
            $table->dateTime('fecha_ingreso')->nullable();
            $table->string('puesto_inicial', 60)->nullable();
            $table->string('puesto_final', 60)->nullable();
            $table->enum('jornada', ['Completo', 'Medio', 'Horas'])->nullable();
            $table->enum('contrato', ['Indeterminado', 'Eventual', 'Honorarios'])->nullable();
            $table->integer('ingreso')->nullable();
            $table->integer('actividad_laboral')->nullable();
            $table->string('factores_contratacion', 500);
            $table->string('carencias_basicas', 200)->nullable();
            $table->string('carencias_areas', 200)->nullable();
            $table->string('motivo_no_posgrado', 100);
            $table->string('recomendaciones', 500)->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('PrimerEmpleo');
        Schema::enableForeignKeyConstraints();
    }
}

