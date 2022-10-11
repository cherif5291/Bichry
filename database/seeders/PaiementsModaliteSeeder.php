<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PaiementsModalite;

class PaiementsModaliteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PaiementsModalite::factory()
            ->count(5)
            ->create();
    }
}
