<?php

namespace Database\Seeders;

use App\Models\Paie;
use Illuminate\Database\Seeder;

class PaieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Paie::factory()
            ->count(5)
            ->create();
    }
}
