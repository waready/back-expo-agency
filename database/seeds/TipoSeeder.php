<?php

use Illuminate\Database\Seeder;
use App\tipo;
use Carbon\Carbon;

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
        tipo::create(['nombre'  => 'FICHA DE MONITOREO A ESPECIALISTA',
        'inicio' => Carbon::parse('2021-01-01'),
        'fin' => Carbon::parse('2021-01-01') ]);
        //director
        tipo::create(['nombre'  => 'FICHA DE MONITOREO A DIRECTORES',
        'inicio' => Carbon::parse('2021-01-01'),
        'fin' => Carbon::parse('2021-01-01') ]);
    }
}
