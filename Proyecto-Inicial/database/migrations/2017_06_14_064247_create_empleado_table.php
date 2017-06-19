<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmpleadoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Empleado', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('carrera');
            $table->string('puesto', 200);
            $table->integer('antiguedad');
            $table->integer('unidad_tiempo');
            $table->string('carencias_basicas', 200);
            $table->string('conocimientos_actualizados', 200);
            $table->string('carencias_areas', 200);
            $table->string('factores_contratacion', 100);
            $table->integer('empleador_id')->unsigned();
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
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('Empleado');
        Schema::enableForeignKeyConstraints();
    }
}

