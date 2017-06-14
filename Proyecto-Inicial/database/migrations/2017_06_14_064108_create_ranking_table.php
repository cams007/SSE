<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRankingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Ranking', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('calificacion');
            $table->string('comentario', 300);
            $table->string('egresado_matricula', 12);
            $table->foreign('egresado_matricula')->references('matricula')->on('Egresado');
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
        Schema::disableForeignKeyContrains();
        Schema::dropIfExists('Ranking');
        Schema::enableForeignKeyContrains();
    }
}

