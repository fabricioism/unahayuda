<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContenidoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Contenido', function (Blueprint $table) {
            $table->integer('paquete_id');
            $table->integer('articulo_id');
            $table->integer('cantidad');
            $table->timestamps();

            $table->foreign('paquete_id')->references('id')->on('Paquete');
            $table->foreign('articulo_id')->references('id')->on('Articulo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Contenido');
    }
}
