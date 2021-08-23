<?php

use App\DirectorNivel;
use Illuminate\Database\Seeder;

class DirectorNivelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DirectorNivel::create([
            'id_nivel' => 1,
            'nombre'  => 'ESCOLARIZADO'
        ]);
        DirectorNivel::create([
            'id_nivel' => 1,
            'nombre'  => 'NO ESCOLARIZADO'
        ]);
        /**cuna para inicial */
        /*** */
        DirectorNivel::create([
            'id_nivel' => 2,
            'nombre'  => 'Unidocente(EIB)'
        ]);
        DirectorNivel::create([
            'id_nivel' => 2,
            'nombre'  => 'Multigrado/EIB'
        ]);
        DirectorNivel::create([
            'id_nivel' => 2,
            'nombre'  => 'Polidocente'
        ]);
        
        DirectorNivel::create([
            'id_nivel' => 3,
            'nombre'  => 'JER'
        ]);
        DirectorNivel::create([
            'id_nivel' => 3,
            'nombre'  => 'JEC'
        ]);
        DirectorNivel::create([
            'id_nivel' => 3,
            'nombre'  => 'CRFA'
        ]);
        DirectorNivel::create([
            'id_nivel' => 3,
            'nombre'  => 'COAR'
        ]);
    }
}
