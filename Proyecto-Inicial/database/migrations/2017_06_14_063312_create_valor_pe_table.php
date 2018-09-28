<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateValorPETable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ValorPE', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('valor', 100 );
            $table->integer('primerEmpleo_id')->unsigned();
            $table->foreign('primerEmpleo_id')->references('id')->on('PrimerEmpleo');
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
        Schema::dropIfExists('ValorPE');
        Schema::enableForeignKeyConstraints();
    }
}
