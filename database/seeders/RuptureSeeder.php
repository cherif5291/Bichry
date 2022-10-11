<?php

namespace Database\Seeders;

use App\Models\Rupture;
use Illuminate\Database\Seeder;

class RuptureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Rupture::factory()
            ->count(5)
            ->create();
    }
}
