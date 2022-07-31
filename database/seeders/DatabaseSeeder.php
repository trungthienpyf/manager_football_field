<?php

namespace Database\Seeders;

use App\Models\Area;
use App\Models\Pitch;
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
        // User::factory(10)->create();
         Area::factory(10)->create();
         Pitch::factory(100)->create();
            $this->call(PitchSeeder::class);
    }
}
