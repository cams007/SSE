<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('usuario', 60);
            $table->string('password', 60);
            $table->string('egresado_matricula', 12);
            $table->foreign('egresado_matricula')->references('matricula')->on('Egresado');
            
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
        Schema::disableForeignKeyContrains();
        Schema::dropIfExists('users');
        Schema::enableForeignKeyContrains();
    }
}
