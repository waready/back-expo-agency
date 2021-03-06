<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTiposTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    /* tipos de examenes */
    Schema::create('tipos', function (Blueprint $table) {
      $table->id();
      $table->string('nombre');
      $table->string('descripcion')->nullable();
      $table->date('inicio')->nullable();
      $table->date('fin')->nullable();
      $table->string('doc')->nullable();
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
    Schema::dropIfExists('tipos');
  }
}
