<?php

namespace Database\Seeders;

use App\Models\ModelesRecu;
use Illuminate\Database\Seeder;

class ModelesRecuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ModelesRecu::factory()
            ->count(5)
            ->create();
    }
}
