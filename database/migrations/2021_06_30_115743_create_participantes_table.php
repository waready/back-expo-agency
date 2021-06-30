<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParticipantesTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('participantes', function (Blueprint $table) {
      $table->id();
      $table->timestamps();
      $table->string('nombres', 150);
      $table->string('paterno', 50);
      $table->string('materno', 50);
      $table->string('dni', 11);
      $table->string('email')->nullable();
      $table->boolean('sexo');
      /** ['estatal', 'no_estatal'] */
      $table->unsignedTinyInteger('gestion');
      /** ['urbano', 'rural'] */
      $table->unsignedTinyInteger('area');
      $table->unsignedTinyInteger('nivel')->default(0);
      /**
       * inicial
       * escolarizado
       * no_Escolarizado
       */

      $table->unsignedBigInteger('id_user');
      $table->foreign('id_user')->references('id')->on('users');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('participantes');
  }
}
