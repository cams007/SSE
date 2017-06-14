<<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmpleadorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Empleador', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('nombre', 200);
            $table->string('rfc', 45);
            $table->string('telefono', 12);
            $table->string('correo', 50);
            $table->string('calle', 45);
            $table->integer('numero');
            $table->string('colonia', 60);
            $table->string('ciudad', 60);
            $table->string('estado', 60);
            $table->integer('codigo_postal');
            $table->string('motivo_no_contratacion', 60);
            $table->string('recomendaciones', 200);
            $table->integer('contacto_id')->unsigned();
            $table->foreign('contacto_id')->references('id')->on('Contacto');

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
        Schema::dropIfExists('Empleador');
        Schema::enableForeignKeyContrains();
    }
}
