<?php

namespace Database\Seeders;

use App\Models\PiecesJointe;
use Illuminate\Database\Seeder;

class PiecesJointeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PiecesJointe::factory()
            ->count(5)
            ->create();
    }
}
