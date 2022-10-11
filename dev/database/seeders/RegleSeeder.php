<?php

namespace Database\Seeders;

use App\Models\Regle;
use Illuminate\Database\Seeder;

class RegleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Regle::factory()
            ->count(5)
            ->create();
    }
}
