<?php

namespace Database\Seeders;

use App\Models\ContratsModel;
use Illuminate\Database\Seeder;

class ContratsModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ContratsModel::factory()
            ->count(5)
            ->create();
    }
}
