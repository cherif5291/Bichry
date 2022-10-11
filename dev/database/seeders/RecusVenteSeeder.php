<?php

namespace Database\Seeders;

use App\Models\RecusVente;
use Illuminate\Database\Seeder;

class RecusVenteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        RecusVente::factory()
            ->count(5)
            ->create();
    }
}
