<?php

namespace Database\Seeders;

use App\Models\ModelesDevis;
use Illuminate\Database\Seeder;

class ModelesDevisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ModelesDevis::factory()
            ->count(5)
            ->create();
    }
}
