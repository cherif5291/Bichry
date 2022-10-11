<?php

namespace Database\Seeders;

use App\Models\InfosSystem;
use Illuminate\Database\Seeder;

class InfosSystemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        InfosSystem::factory()
            ->count(5)
            ->create();
    }
}
