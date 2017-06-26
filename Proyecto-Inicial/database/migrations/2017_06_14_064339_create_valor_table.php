<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateValorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Valor', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('valor', 45);
            $table->boolean('demostrado');
            $table->integer('empleado_id')->unsigned();
            $table->foreign('empleado_id')->references('id')->on('Empleado');
            $table->integer('catalogoValor_id')->unsigned();
            $table->foreign('catalogoValor_id')->references('id')->on('CatalogoValor')->unique();
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
        Schema::dropIfExists('Valor');
        Schema::enableForeignKeyConstraints();
    }
}
