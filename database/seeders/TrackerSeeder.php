<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TrackerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Tracker::factory(10)->create();
    }
}
