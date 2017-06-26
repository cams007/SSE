<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHabilidadTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Habilidad', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('habilidad', 45);
            $table->boolean('demostrada');
            $table->integer('empleado_id')->unsigned();
            $table->foreign('empleado_id')->references('id')->on('Empleado');
            $table->integer('catalogoHabilidad_id')->unsigned();
            $table->foreign('catalogoHabilidad_id')->references('id')->on('CatalogoHabilidad')->unique();
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
        Schema::dropIfExists('Habilidad');
        Schema::enableForeignKeyConstraints();
    }
}

