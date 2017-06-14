<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRankingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Ranking', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('calificacion');
            $table->string('comentario', 300);
            $table->foreign('egresado_matricula')->references('id')->on('Egresado');
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
        Schema::dropIfExists('Ranking');
    }
}
