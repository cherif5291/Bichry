<?php

namespace Database\Seeders;

use App\Models\Fonctionnalite;
use Illuminate\Database\Seeder;

class FonctionnaliteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Fonctionnalite::factory()
            ->count(5)
            ->create();
    }
}
