<?php

namespace Database\Seeders;

use App\Models\Taxe;
use Illuminate\Database\Seeder;

class TaxeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Taxe::factory()
            ->count(5)
            ->create();
    }
}
