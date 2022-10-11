<?php

namespace Database\Seeders;

use App\Models\Revenu;
use Illuminate\Database\Seeder;

class RevenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Revenu::factory()
            ->count(5)
            ->create();
    }
}
