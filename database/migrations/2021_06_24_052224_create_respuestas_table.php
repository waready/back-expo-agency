<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRespuestasTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('respuestas', function (Blueprint $table) {
      $table->id();
      $table->timestamps();
      $table->unsignedBigInteger('id_examen_ejecutado');
      $table->foreign('id_examen_ejecutado')->references('id')->on('examenes_ejecutados');
      $table->unsignedBigInteger('id_user');
      $table->foreign('id_user')->references('id')->on('users');
      $table->unsignedBigInteger('id_pregunta');
      $table->foreign('id_pregunta')->references('id')->on('preguntas');
      $table->unsignedInteger('respuesta')->comment('Repuesta enviada');
      $table->decimal('calificacion', 8, 2)->nullable()->comment('Calificacion por respuesta');
      $table->unsignedTinyInteger('aciertos')->default(0);
      $table->string('observacion')->nullable()->comment('Observacion adjunta, Evidencia');
      $table->timestamp('calificado')->nullable()->comment('Fecha en la cual fue calificado, en caso la calificacion no sea automatica');

      $table->string('documento')->nullable();
      $table->string('url')->nullable();
      
      $table->unique(['id_user', 'id_pregunta', 'id_examen_ejecutado']);
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('respuestas');
  }
}
