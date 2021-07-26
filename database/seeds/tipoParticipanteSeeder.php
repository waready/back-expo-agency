<?php

use App\TipoParticipante;
use Illuminate\Database\Seeder;

class tipoParticipanteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TipoParticipante::create(['nombre'  => 'administrador']);
        TipoParticipante::create(['nombre'  => 'especialista drep']);
        TipoParticipante::create(['nombre'  => 'especialista ugel']);
        TipoParticipante::create(['nombre'  => 'director']);
        TipoParticipante::create(['nombre'  => 'docente']);
    }
}
