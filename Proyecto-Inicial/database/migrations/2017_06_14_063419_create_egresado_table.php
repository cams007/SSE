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
            $table->integer('genero');
            $table->date('fecha_nacimiento');
            $table->integer('nacionalidad');
            $table->string('telefono', 12)->nullable();
            $table->string('correo', 50)->nullable();
            $table->string('lugar_origen', 200);
            $table->string('lugar_actual', 200)->nullable();
            $table->integer('preparacion_id')->unsigned();
            $table->foreign('preparacion_id')
                  ->references('id')->on('Preparacion')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
            $table->integer('primerEmpleo_id')->unsigned();
            $table->foreign('primerEmpleo_id')
                  ->references('id')->on('PrimerEmpleo')
                  ->onUpdate('cascade')
                  ->onDelete('cascade')
                  ->unique()->nullable();

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
        Schema::dropIfExists('Egresado');
        Schema::enableForeignKeyContrains();
    }
}
