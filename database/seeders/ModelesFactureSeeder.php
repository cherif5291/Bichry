<?php

namespace Database\Seeders;

use App\Models\ModelesFacture;
use Illuminate\Database\Seeder;

class ModelesFactureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ModelesFacture::factory()
            ->count(5)
            ->create();
    }
}
