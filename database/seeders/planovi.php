<?php

namespace Database\Seeders;

use App\Models\Planer;
use Illuminate\Database\Seeder;

class planovi extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        $doba = ['prolece', 'leto', 'jesen', 'zima'];

        for ($i = 0; $i < 20; $i++){
            Planer::create([
                'opis' => $faker->sentence(4),
                'doba' => $doba[rand(0,3)],
                'cena' => rand(100,2000),
                'destinacija_id' => rand(1,3)
            ]);
        }
    }
}
