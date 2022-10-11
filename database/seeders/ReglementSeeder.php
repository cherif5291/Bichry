<?php

namespace Database\Seeders;

use App\Models\Reglement;
use Illuminate\Database\Seeder;

class ReglementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Reglement::factory()
            ->count(5)
            ->create();
    }
}
