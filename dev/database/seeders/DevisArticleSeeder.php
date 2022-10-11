<?php

namespace Database\Seeders;

use App\Models\DevisArticle;
use Illuminate\Database\Seeder;

class DevisArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DevisArticle::factory()
            ->count(5)
            ->create();
    }
}
