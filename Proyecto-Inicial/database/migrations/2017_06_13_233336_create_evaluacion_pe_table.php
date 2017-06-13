<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEvaluacionPEsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('EvaluacionPE', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('evaluacion');
            $table->foreign('primerEmpleo_id')->references('id')->on('PrimerEmpleo');
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
        Schema::dropIfExists('EvaluacionPE');
    }
}
