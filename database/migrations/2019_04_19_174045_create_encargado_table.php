<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEncargadoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Encargado', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre1', 50);
            $table->string('nombre2', 50)->nullable();
            $table->string('apellido1', 50);
            $table->string('apellido2', 50)->nullable();
            $table->string('correo', 50);
            $table->string('direccion', 200);
            $table->string('telefono', 25)->nullable();
            $table->string('contrasena', 200);
            $table->integer('idRol');
            $table->timestamps();

            $table->foreign('idRol')->references('id')->on('Rol');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Encargado');
    }
}
