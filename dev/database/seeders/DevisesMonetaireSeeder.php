<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DevisesMonetaire;

class DevisesMonetaireSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DevisesMonetaire::factory()
            ->count(5)
            ->create();
    }
}
