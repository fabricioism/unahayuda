<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTareaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Tarea', function (Blueprint $table) {
            $table->increments('codigo');
            $table->string('nombre', 50);
            $table->string('descripcion', 150);
            $table->integer('lista_id')->nullable();
            $table->integer('tipo_id');
            $table->integer('status_id');
            $table->timestamps();

            $table->foreign('lista_id')->references('id')->on('Lista');
            $table->foreign('tipo_id')->references('id')->on('Tipo');
            $table->foreign('status_id')->references('id')->on('Status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Tarea');
    }
}
