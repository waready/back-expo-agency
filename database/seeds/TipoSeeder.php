<?php

use Illuminate\Database\Seeder;
use App\tipo;

class TipoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //ugel
        tipo::create(['nombre'  => 'FICHA DE MONITOREO A ESPECIALISTA']);
        //director
        tipo::create(['nombre'  => 'FICHA DE MONITOREO A DIRECTORES']);
    }
}
