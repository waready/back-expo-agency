<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UgelSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(tipoParticipanteSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(TipoSeeder::class);
        $this->call(CategoriaSeeder::class);
        $this->call(PreguntaSeeder::class);
        $this->call(DirectorNivelSeeder::class);

        if(config('app.env') == 'local') {
          $this->call(FakeDirectoresSeeder::class);
        }
    }
}
