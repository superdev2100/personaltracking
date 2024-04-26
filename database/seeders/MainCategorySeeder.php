<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class MainCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\MainCategory::factory(10)->create();
    }
}
