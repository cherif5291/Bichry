<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\EmployesEntreprise;

class EmployesEntrepriseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        EmployesEntreprise::factory()
            ->count(5)
            ->create();
    }
}
