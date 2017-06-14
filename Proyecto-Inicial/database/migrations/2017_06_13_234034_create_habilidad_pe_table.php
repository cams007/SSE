<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHabilidadPEsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('HabilidadPE', function (Blueprint $table) {
            $table->increments('id');
            $table->string('habilidad', 45);
            $table->foreign('primerEmpleo_id')->references('id')->on('PrimerEmpleo');
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
        Schema::dropIfExists('HabilidadPE');
    }
}
