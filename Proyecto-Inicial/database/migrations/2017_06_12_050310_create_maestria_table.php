<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMaestriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Maestria', function (Blueprint $table) {
            $table->increments('id');
            $table->string('descripcion', 200);
            $table->boolean('titulado');
            $table->foreign('preparacion_id')->references('id')->on('Preparacion');

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
        Schema::dropIfExists('Maestria');
    }
}
