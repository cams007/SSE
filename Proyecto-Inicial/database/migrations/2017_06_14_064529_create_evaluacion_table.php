<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEvaluacionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Evaluacion', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('evaluacion');
            $table->integer('empleado_id')->unsigned();
            $table->foreign('empleado_id')->references('id')->on('Empleado');
            $table->integer('catalogoPregunta_id')->unsigned();
            $table->foreign('catalogoPregunta_id')->references('id')->on('CatalogoPregunta');

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
        Schema::dropIfExists('Evaluacion');
        Schema::enableForeignKeyContrains();
    }
}
