<?php

use App\Ugel;
use Illuminate\Database\Seeder;

class UgelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Ugel::create(['nombre'  => 'UGEL Puno']);
        Ugel::create(['nombre'  => 'UGEL Sandia']);
        Ugel::create(['nombre'  => 'UGEL Azángaro']);
        Ugel::create(['nombre'  => 'UGEL Crucero']);
        Ugel::create(['nombre'  => 'UGEL Chucuito']);
        Ugel::create(['nombre'  => 'UGEL San Román']);
        Ugel::create(['nombre'  => 'UGEL Huancané']);
        Ugel::create(['nombre'  => 'UGEL Yunguyo']);
        Ugel::create(['nombre'  => 'UGEL El Collao']);
        Ugel::create(['nombre'  => 'UGEL Melgar']);
        Ugel::create(['nombre'  => 'UGEL Lampa']);
        Ugel::create(['nombre'  => 'UGEL Carabaya']);
        Ugel::create(['nombre'  => 'UGEL Moho']);
        Ugel::create(['nombre'  => 'UGEL San Antonio de Putina']);
    }
}
