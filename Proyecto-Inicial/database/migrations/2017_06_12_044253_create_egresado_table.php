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
        Schema::create('egresado', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->integer('matricula')->primary();
            $table->string('nombre',100);
            $table->string('curp',20)->unique();
            $table->integer('genero');
            $table->dateTime('fecha_nacimiento');
            $table->integer('nacionalidad');
            $table->string('telefono',12);
            $table->string('correo',90);
            $table->string('lugar_origen',100);
            $table->string('lugar_actual',100);
            $table->integer('preparacion_id')->unsigned();
            $table->integer('primer_empleo_id')->unsigned();
            $table->rememberToken();
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
        Schema::dropIfExists('egresado');
        Schema::enableForeignKeyConstraints();
    }
}
