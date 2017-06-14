<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOfertaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Oferta', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('titulo_empleo', 200);
            $table->string('descripcion', 500);
            $table->integer('carrera');
            $table->integer('salario');
            $table->date('fecha_publicacion');
            $table->boolean('habilitada');
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
        Schema::dropIfExists('Oferta');
        Schema::enableForeignKeyContrains();
    }
}

