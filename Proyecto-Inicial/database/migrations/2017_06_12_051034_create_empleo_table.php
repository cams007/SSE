<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmpleosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Empleo', function (Blueprint $table) {
            $table->increments('id');
            $table->string('empresa', 200);
            $table->string('puesto_inicial', 200);
            $table->string('puesto_final', 200);
            $table->string('funciones', 400);
            $table->date('antiguedad');
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
        Schema::dropIfExists('Empleo');
    }
}
