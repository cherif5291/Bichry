<?php

namespace Database\Seeders;

use App\Models\DepensesPanier;
use Illuminate\Database\Seeder;

class DepensesPanierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DepensesPanier::factory()
            ->count(5)
            ->create();
    }
}
