<?php

namespace Database\Seeders;

use App\Models\Impot;
use Illuminate\Database\Seeder;

class ImpotSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Impot::factory()
            ->count(5)
            ->create();
    }
}
