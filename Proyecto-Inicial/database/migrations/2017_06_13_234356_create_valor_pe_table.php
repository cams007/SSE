<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateValorPEsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ValorPE', function (Blueprint $table) {
            $table->increments('id');
            $table->string('valor', 45);
            $table->foreign('primerEmpleo_id')->references('id')->on('PrimerEmpleo');
            $table->foreign('catalogoValor_id')->references('id')->on('CatalogoValor');

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
        Schema::dropIfExists('ValorPE');
    }
}
