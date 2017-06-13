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
            $table->date('fecha_ingreso');
            $table->string('empresa', 200);
            $table->string('puesto_inicial', 200);
            $table->string('puesto_actual', 200);
            $table->integer('sector');
            $table->integer('jornada');
            $table->integer('contrato');
            $table->string('ingreso', 45);
            $table->string('actividad_laboral', 200);
            $table->integer('tiempo_sin_empleo');
            $table->string('factores_contratacion', 400);
            $table->string('carencias_basicas', 400);
            $table->string('carencias_areas', 400);

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
