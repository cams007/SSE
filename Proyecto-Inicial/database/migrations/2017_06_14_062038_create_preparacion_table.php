<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePreparacionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Preparacion', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('carrera');
            $table->string('generacion', 10);
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            $table->float('promedio', 8, 2);
            $table->enum('forma_titulacion', ['Tesis', 'CENEVAL', 'No titulado'])->nullable();
            $table->dateTime('fecha_titulo')->nullable();
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
        Schema::dropIfExists('Preparacion');
        Schema::enableForeignKeyConstraints();
    }
}
