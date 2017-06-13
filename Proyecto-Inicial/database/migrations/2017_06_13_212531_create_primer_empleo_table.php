<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrimerEmpleosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('PrimerEmpleo', function (Blueprint $table) {
            $table->increments('id');
            $table->string('empresa', 200);
            $table->integer('sector');
            $table->date('fecha_ingreso');
            $table->string('puesto_inicial', 200);
            $table->string('puesto_final', 200);
            $table->integer('jornada');
            $table->integer('contrato');
            $table->integer('ingreso');
            $table->integer('actividad_laboral');
            $table->integer('tiempo_sin_empleo');
            $table->string('factores_contratacion', 400);
            $table->string('carencias_basicas', 400);
            $table->string('carencias_areas', 400);
            $table->string('motivo_no_posgrado', 100); //Motivo de no continuar estudios de posgrado en UTM
            $table->string('recomendaciones', 500);

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
        Schema::dropIfExists('PrimerEmpleo');
    }
}
