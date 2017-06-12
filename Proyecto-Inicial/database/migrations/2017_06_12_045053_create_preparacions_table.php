<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePreparacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Preparacion', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('carrera');
            $table->integer('forma_titulacion');
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            $table->date('fecha_titulo');
            $table->integer('promedio');

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
        Schema::dropIfExists('Preparacion');
    }
}
