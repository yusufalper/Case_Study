<?php

namespace Database\Seeders;

use App\Models\Developer;
use Illuminate\Database\Seeder;

class DeveloperSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Developer::create([
            'developer' => 'DEV1',
            'time' => 1,
            'ability' => 1,
        ]);
        Developer::create([
            'developer' => 'DEV2',
            'time' => 1,
            'ability' => 2,
        ]);
        Developer::create([
            'developer' => 'DEV3',
            'time' => 1,
            'ability' => 3,
        ]);
        Developer::create([
            'developer' => 'DEV4',
            'time' => 1,
            'ability' => 4,
        ]);
        Developer::create([
            'developer' => 'DEV5',
            'time' => 1,
            'ability' => 5,
        ]);
    }
}
