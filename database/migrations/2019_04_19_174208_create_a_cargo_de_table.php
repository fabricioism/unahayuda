<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateACargoDeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('A_Cargo_De', function (Blueprint $table) {
            $table->integer('encargado_id');
            $table->integer('voluntario_id');
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            $table->integer('calificacion');
            $table->string('observacion', 150);
            $table->timestamps();

            $table->foreign('encargado_id')->references('id')->on('Encargado');
            $table->foreign('voluntario_id')->references('id')->on('Voluntario');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('A_Cargo_De');
    }
}
