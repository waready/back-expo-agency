<?php

use Illuminate\Database\Seeder;
use App\categoria;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       ///ugel
        categoria::create([
            'nombre'  => 'A) Especialistas fortalecen capacidades a directivos y docentes para la ejecución del trabajo a distancia y educación virtual',
            'id_tipo' => 1
        ]);
        categoria::create([
            'nombre'  => 'B) Especialistas desarrollan soporte socioemocional a directivos y docentes',
            'id_tipo' => 1
        ]);
        categoria::create([
            'nombre'  => 'C) Especialistas implementan a directivos y docentes en el “Aprendizaje Basado en Proyectos”',
            'id_tipo' => 1
        ]);
        categoria::create([
            'nombre'  => 'D) Especialistas implementan acciones de prevención y cuidados frente a la COVID-19',
            'id_tipo' => 1
        ]);
        categoria::create([
            'nombre'  => 'E) Especialistas implementan actividades complementarias para fortalecer la estrategia “Aprendo en casa”.',
            'id_tipo' => 1
        ]);
        categoria::create([
            'nombre'  => 'F) Especialistas implementan la construcción de una ciudadanía más allá del bicentenario. ',
            'id_tipo' => 1
        ]);


        //Director

        categoria::create([
            'nombre'  => 'A) Directores fortalecen capacidades a docentes para la ejecución del trabajo a distancia y educación virtual',
            'id_tipo' => 2
        ]);
        categoria::create([
            'nombre'  => 'B) Especialistas desarrollan soporte socioemocional a directivos y docentes',
            'id_tipo' => 2
        ]);
        categoria::create([
            'nombre'  => 'C) Directores implementan a docentes en el “Aprendizaje Basado en Proyectos”.',
            'id_tipo' => 2
        ]);
        categoria::create([
            'nombre'  => 'D) Directores implementan a docentes acciones de prevención y cuidados frente a la COVID-19.',
            'id_tipo' => 2
        ]);
        categoria::create([
            'nombre'  => 'E) Directores implementan a docentes actividades complementarias para fortalecer la estrategia “Aprendo en casa”.',
            'id_tipo' => 2
        ]);
        categoria::create([
            'nombre'  => 'F) Directores implementan la construcción de una ciudadanía más allá del bicentenario. ',
            'id_tipo' => 2
        ]);
    }
}
