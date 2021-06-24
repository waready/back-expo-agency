<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePreguntasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {   /**respuestas */
        Schema::create('preguntas', function (Blueprint $table) {
            $table->id();
            $table->integer('numero');
            $table->string('enunciado');
            $table->float('puntaje', 8, 2);
            $table->integer('clave');

            $table->unsignedBigInteger('id_categoria');
            $table->foreign('id_categoria')->references('id')->on('categorias');

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
        Schema::dropIfExists('preguntas');
    }
}
