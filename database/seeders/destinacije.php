<?php

namespace Database\Seeders;

use App\Models\Destinacija;
use Illuminate\Database\Seeder;

class destinacije extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Destinacija::create([
            'destinacija' => 'Santorini',
            'zemlja' => 'Grčka'
        ]);

        Destinacija::create([
            'destinacija' => 'Venecija',
            'zemlja' => 'Italija'
        ]);

        Destinacija::create([
            'destinacija' => 'Palma de Majorka',
            'zemlja' => 'Španija'
        ]);
    }
}
