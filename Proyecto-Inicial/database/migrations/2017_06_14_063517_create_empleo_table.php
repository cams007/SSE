<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmpleoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Empleo', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('empresa', 200);
            $table->string('puesto_inicial', 200);
            $table->string('puesto_final', 200);
            $table->string('funciones', 400);
            $table->integer('antiguedad');
            $table->integer('unidad_tiempo');
            $table->string('egresado_matricula', 12);
            $table->foreign('egresado_matricula')->references('matricula')->on('Egresado');

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
        Schema::dropIfExists('Empleo');
        Schema::enableForeignKeyConstraints();
    }
}

