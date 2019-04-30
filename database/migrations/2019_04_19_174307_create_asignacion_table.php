<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAsignacionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Asignacion', function (Blueprint $table) {
            $table->integer('voluntario_id');
            $table->integer('tarea_codigo');
            $table->dateTime('hora_inicio');
            $table->dateTime('hora_fin');
            $table->timestamps();

            $table->foreign('voluntario_id')->references('id')->on('Voluntario');

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
        Schema::dropIfExists('Asignacion');
    }
}
