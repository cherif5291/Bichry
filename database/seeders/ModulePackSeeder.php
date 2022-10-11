<?php

namespace Database\Seeders;

use App\Models\ModulePack;
use Illuminate\Database\Seeder;

class ModulePackSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ModulePack::factory()
            ->count(5)
            ->create();
    }
}
