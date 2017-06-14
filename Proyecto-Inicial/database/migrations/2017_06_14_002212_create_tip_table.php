<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Tip', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titulo', 60);
            $table->string('descripcion', 500);
            $table->string('imagen', 300);
            $table->dateTime('fecha_publicacion');
            $table->boolean('activo');

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
        Schema::dropIfExists('Tip');
    }
}
