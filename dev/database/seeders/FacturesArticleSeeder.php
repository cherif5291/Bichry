<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\FacturesArticle;

class FacturesArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        FacturesArticle::factory()
            ->count(5)
            ->create();
    }
}
