<<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmpleadorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Empresa', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('nombre', 200);
            $table->string('descripcion', 500);
            $table->string('rfc', 45)->nullable();
            $table->enum('sector', ['Pública', 'Privada', 'Propia'])->nullable();
            $table->string('giro', 200);
            $table->string('telefono', 12);
            $table->string('correo', 50);
            $table->string('calle', 45);
            $table->integer('numero');
            $table->string('colonia', 60);
            $table->string('ciudad', 60);
            $table->string('estado', 60);
            $table->string('codigo_postal', 60);
            $table->string('pagina_web', 200);
            $table->string('imagen_url', 500);
            $table->boolean('habilitada');
            $table->string('motivo_no_contratacion', 200)->nullable();
            $table->string('recomendaciones', 200);
            $table->integer('contacto_id')->unsigned();
            $table->foreign('contacto_id')->references('id')->on('Contacto')->unique();

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
        Schema::dropIfExists('Empresa');
        Schema::enableForeignKeyConstraints();
    }
}
