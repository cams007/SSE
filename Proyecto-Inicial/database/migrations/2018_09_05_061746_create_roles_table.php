<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Generamos la tabla Roles
        Schema::create('roles', function (Blueprint $table) {
            $table->increments('id');
            // Nombre del rol
            $table->string( 'name' );
            // Descripcion del rol
            $table->string( 'description' );
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
        Schema::dropIfExists('roles');
    }
}
