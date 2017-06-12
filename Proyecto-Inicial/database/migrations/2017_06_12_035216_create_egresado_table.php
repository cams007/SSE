<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEgresadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('egresado', function (Blueprint $table) {
            $table->string('matricula', 12)->primary()->unique();
            $table->string('nombre', 100);
            $table->string('curp', 25);
            $table->integer('genero');
            $table->date('fecha_nacimiento');
            $table->integer('nacionalidad');
            $table->string('telefono', 12);
            $table->string('correo', 50);
            $table->string('lugar_origen', 200);
            $table->string('lugar_actual', 200);
            $table->foreign('preparacion_id')->references('id')->on('preparacion')->unique();
            $table->foreign('primerEmpleo_id')->references('id')->on('primerEmpleo')->unique();

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
        Schema::dropIfExists('egresado');
    }
}
