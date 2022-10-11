<?php

namespace Database\Seeders;

use App\Models\DocumentsType;
use Illuminate\Database\Seeder;

class DocumentsTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DocumentsType::factory()
            ->count(5)
            ->create();
    }
}
