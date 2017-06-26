<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostulacionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Postulacion', function (Blueprint $table) {
            $table->increments('id');
            $table->string('egresado_matricula', 12)->nullable();
            $table->foreign('egresado_matricula')->references('matricula')->on('Egresado');
            $table->integer('oferta_id')->unsigned();
            $table->foreign('oferta_id')->references('id')->on('Oferta');
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
        Schema::dropIfExists('Postulacion');
        Schema::enableForeignKeyConstraints();
    }
}
