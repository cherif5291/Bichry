<?php

namespace Database\Seeders;

use App\Models\Contrat;
use Illuminate\Database\Seeder;

class ContratSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Contrat::factory()
            ->count(5)
            ->create();
    }
}
