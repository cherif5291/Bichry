<?php

namespace Database\Seeders;

use App\Models\Habilitation;
use Illuminate\Database\Seeder;

class HabilitationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Habilitation::factory()
            ->count(5)
            ->create();
    }
}
