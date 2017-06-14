<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEvaluacionPETable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('EvaluacionPE', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('evaluacion');
            $table->integer('primerEmpleo_id')->unsigned();
            $table->foreign('primerEmpleo_id')->references('id')->on('PrimerEmpleo');
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
        Schema::dropIfExists('EvaluacionPE');
        Schema::enableForeignKeyContrains();
    }
}
