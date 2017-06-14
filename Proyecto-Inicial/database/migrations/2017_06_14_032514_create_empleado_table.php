<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmpleadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empleados', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('carrera');
            $table->string('puesto', 200);
            $table->integer('antiguedad');
            $table->integer('unidad_tiempo');
            $table->string('carencias_basicas', 200);
            $table->string('conocimientos actualizados', 200);
            $table->string('carencias_areas', 200);
            $table->string('factores_contratacion', 100);
            $table->foreign('empleador_id')->references('id')->on('Empleador');

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
        Schema::dropIfExists('empleados');
    }
}
