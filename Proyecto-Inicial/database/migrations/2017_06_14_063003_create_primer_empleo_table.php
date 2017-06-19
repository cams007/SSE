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
            $table->integer('tiempo_sin_empleo');
            $table->string('empresa', 100)->nullable();
            $table->string('telefono_empresa', 12)->nullable();
            $table->integer('sector')->nullable();
            $table->dateTime('fecha_ingreso')->nullable();
            $table->string('puesto_inicial', 60)->nullable();
            $table->string('puesto_final', 60)->nullable();
            $table->integer('jornada')->nullable();
            $table->integer('contrato')->nullable();
            $table->integer('ingreso')->nullable();
            $table->integer('actividad_laboral')->nullable();
            $table->string('factores_contratacion', 200);
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

