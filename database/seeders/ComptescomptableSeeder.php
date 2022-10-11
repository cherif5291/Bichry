<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Comptescomptable;

class ComptescomptableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Comptescomptable::factory()
            ->count(5)
            ->create();
    }
}
