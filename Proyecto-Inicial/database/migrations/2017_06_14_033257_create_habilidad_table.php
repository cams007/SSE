<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHabilidadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Habilidad', function (Blueprint $table) {
            $table->increments('id');
            $table->string('habilidad', 45);
            $table->boolean('demostrada');
            $table->foreign('empleado_id')->references('id')->on('Empleado');
            $table->foreign('catalogoHabilidad_id')->references('id')->on('CatalogoHabilidad');

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
        Schema::dropIfExists('Habilidad');
    }
}
