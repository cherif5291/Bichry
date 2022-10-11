<?php

namespace Database\Seeders;

use App\Models\ContratsType;
use Illuminate\Database\Seeder;

class ContratsTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ContratsType::factory()
            ->count(5)
            ->create();
    }
}
