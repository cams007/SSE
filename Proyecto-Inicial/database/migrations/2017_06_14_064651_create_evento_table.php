<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Evento', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('nombre', 60);
            $table->string('descripcion', 5000);
            $table->string('lugar', 150);
            $table->date('fecha');
            $table->time('hora');
            $table->enum('categoria', ['Académico', 'Cultural']);
            $table->string('imagen_url', 500);
            $table->boolean('activo');
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
        Schema::dropIfExists('Evento');
        Schema::enableForeignKeyConstraints();
    }
}
