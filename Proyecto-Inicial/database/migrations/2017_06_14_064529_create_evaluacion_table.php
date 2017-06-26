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
            $table->enum('evaluacion', ['Indispensable', 'Deseable', 'Poco indispensable', 'No indispensable']);
            $table->integer('empleado_id')->unsigned();
            $table->foreign('empleado_id')->references('id')->on('Empleado');
            $table->integer('catalogoPregunta_id')->unsigned();
            $table->foreign('catalogoPregunta_id')->references('id')->on('CatalogoPregunta')->unique();
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
        Schema::dropIfExists('Evaluacion');
        Schema::enableForeignKeyConstraints();
    }
}
