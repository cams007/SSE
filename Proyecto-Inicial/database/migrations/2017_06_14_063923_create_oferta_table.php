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
            $table->string('ubicacion', 100);
            $table->integer('carrera');
            $table->integer('experiencia');
            $table->integer('salario');
            $table->enum('status', ['Vacante', 'Ocupada', 'Cancelada']);
            $table->integer('empresa_id')->unsigned();
            $table->foreign('empresa_id')->references('id')->on('Empresa');
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
        Schema::dropIfExists('Oferta');
        Schema::enableForeignKeyConstraints();
    }
}

