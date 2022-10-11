<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\DevisArticle;
use Illuminate\Database\Eloquent\Factories\Factory;

class DevisArticleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = DevisArticle::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'qte' => $this->faker->randomNumber(0),
            'taux' => $this->faker->randomNumber(2),
            'total' => $this->faker->randomNumber(2),
            'devis_id' => \App\Models\Devis::factory(),
            'article_id' => \App\Models\Article::factory(),
            'taxe_id' => \App\Models\Taxe::factory(),
        ];
    }
}
