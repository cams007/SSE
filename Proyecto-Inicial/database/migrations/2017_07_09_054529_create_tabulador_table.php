<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTabuladorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Tabulador', function (Blueprint $table) {
            $table->increments('id');
            $table->string('empleo', 200);
            $table->integer('carrera');
            $table->integer('experiencia');
            $table->enum('unidad_tiempo', ['meses', 'años']);
            $table->integer('monto_minimo');
            $table->integer('monto_maximo');
            $table->enum('unidad_monto', ['mensuales', 'anuales']);
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
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('Tabulador');
        Schema::enableForeignKeyConstraints();
    }
}
