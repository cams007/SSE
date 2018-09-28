<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHabilidadPETable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('HabilidadPE', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('habilidad', 100 );
            $table->integer('primerEmpleo_id')->unsigned();
            $table->foreign('primerEmpleo_id')->references('id')->on('PrimerEmpleo');
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
        Schema::dropIfExists('HabilidadPE');
        Schema::enableForeignKeyConstraints();
    }
}

