<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrimerEmpreoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('primer_empleo', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            
            $table->increments('id');
            $table->dateTime('fecha_ingreso');
            $table->string('puesto_actual',45);
            $table->string('puesto_inicial',45);
            $table->string('nombre_empresa',45);
            $table->integer('sector');
            $table->integer('jornada');
            $table->integer('contrato');
            $table->string('ingreso',45);
            $table->string('actividad_laboral',100);
            $table->integer('tiempo_sin_empleo');
            $table->string('factores_contratacion',200);
            $table->string('carencias_basicas',200);
            $table->string('carencias_areas',200);
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
        Schema::dropIfExists('primer_empleo');
    }
}
