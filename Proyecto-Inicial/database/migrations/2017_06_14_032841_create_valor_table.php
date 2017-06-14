<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateValorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Valor', function (Blueprint $table) {
            $table->increments('id');
            $table->string('valor', 45);
            $table->boolean('demostrado');
            $table->foreign('empleado_id')->references('id')->on('Empleado');
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
        Schema::dropIfExists('Valor');
    }
}
