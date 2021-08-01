<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExamenesEjecutados extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('examenes_ejecutados', function (Blueprint $table) {
      $table->id();
      $table->timestamps();
      $table->softDeletes();
      $table->unsignedBigInteger('id_user_supervisor');
      $table->foreign('id_user_supervisor')->references('id')->on('users');
      $table->unsignedBigInteger('id_user_supervisado');
      $table->foreign('id_user_supervisado')->references('id')->on('users');
      $table->unsignedBigInteger('id_tipo')->comment('tipo de examen');
      $table->foreign('id_tipo')->references('id')->on('tipos');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('examenes_ejecutados');
  }
}
