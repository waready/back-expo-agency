<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nombres');
         
            $table->string('apellidos');
            $table->string('dni', 11);
            $table->string('profile_picture')->default('User_Circle.png');
            $table->string('celular',20)->nullable();

            $table->enum('tipo', ['0', '1'])->default('0')->comment('0:user|1:trabajador');
            $table->enum('state', ['1', '0'])->default('1')->comment('1:activo|0:inactivo');

            $table->string('condicion')->nullable();
            $table->string('cargo')->nullable();

            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');

            $table->rememberToken();
            
            $table->unsignedBigInteger('id_ugel');
            $table->foreign('id_ugel')->references('id')->on('ugels');

            //director
            $table->unsignedTinyInteger('nivel')->default(0);
            
            ///
           // $table->unsignedTinyInteger('gestion')->nullable();
            $table->enum('gestion', ['0', '1', '2'])->default('0')->comment('0:Ninguno|1:Estatal|2:No Estatal');
            $table->enum('area', ['0', '1', '2'])->default('0')->comment('0:Ninguno|1:Urbano|2:Rural');

            $table->unsignedBigInteger('id_tipo_participante');
            $table->foreign('id_tipo_participante')->references('id')->on('tipo_participantes');

            $table->unsignedBigInteger('id_user')->nullable();
            $table->foreign('id_user')->references('id')->on('users');

            /**nuevo word**/
            $table->string('cod_modular_i_e')->nullable();

            
            $table->string('nombre_i_e')->nullable();
            $table->string('nivel_i_e')->nullable();
            $table->string('caracteristica')->nullable();
            /**gestion ----*/
            /**gestion dependencia -- */
            $table->string('direccion_i_e')->nullable();
            /***directoir--- */
            $table->string('centro_poblado_i_e')->nullable();
            /**area -- */
            $table->string('provincia')->nullable();
            $table->string('distrito')->nullable();

            /***intervencion */

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
        Schema::dropIfExists('users');
    }
}
