<?php

namespace Database\Seeders;

use App\Models\PaiementsMode;
use Illuminate\Database\Seeder;

class PaiementsModeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PaiementsMode::factory()
            ->count(5)
            ->create();
    }
}
