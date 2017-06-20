<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEgresadoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Egresado', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->string('matricula', 12)->primary()->unique();
            $table->string('nombre', 100);
            $table->string('curp', 25);
            $table->enum('genero', ['Masculino', 'Femenino']);
            $table->dateTime('fecha_nacimiento');
            $table->enum('nacionalidad', ['Mexicana', 'Otra'])->nullable();
            $table->string('telefono', 12)->nullable();
            $table->string('lugar_origen', 200);
            $table->string('direccion_actual', 200)->nullable();
            $table->integer('preparacion_id')->unsigned()->nullable();
            $table->foreign('preparacion_id')->references('id')->on('Preparacion')->unique();
            $table->integer('primerEmpleo_id')->unsigned()->nullable();
            $table->foreign('primerEmpleo_id')->references('id')->on('PrimerEmpleo')->unique();

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
        Schema::dropIfExists('Egresado');
        Schema::enableForeignKeyConstraints();
    }
}
