<?php

use App\TipoParticipante;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Foundation\Testing\WithFaker;

class FakeDirectoresSeeder extends Seeder
{

  use WithFaker;
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $this->setUpFaker();

    for ($i = 0; $i < 100; $i++) {
      User::create([
        'nombres'  => $this->faker->name,
        'apellidos'  => $this->faker->lastName,
        'dni'  => $this->faker->numerify('########'),
        'email' => $this->faker->email,
        'id_ugel' => $this->faker->numberBetween(1, 14),
        'id_tipo_participante' => TipoParticipante::DIRECTOR,
        'celular' => $this->faker->numerify('9########'),
        'cargo' => $this->faker->jobTitle,
        'condicion' => '',
        'password' => bcrypt('01318002'),
      ])->assignRole('Director');
    }
  }
}
