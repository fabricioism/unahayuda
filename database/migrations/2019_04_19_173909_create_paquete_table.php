<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaqueteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Paquete', function (Blueprint $table) {
            $table->increments('id');
            $table->dateTime('fecha_creacion');
            $table->decimal('peso', 8,3);
            $table->integer('tarea_codigo');
            $table->timestamps();

            $table->foreign('tarea_codigo')->references('codigo')->on('Tarea');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Paquete');
    }
}
