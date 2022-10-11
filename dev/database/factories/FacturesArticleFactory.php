<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\FacturesArticle;
use Illuminate\Database\Eloquent\Factories\Factory;

class FacturesArticleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = FacturesArticle::class;

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
            'article_id' => \App\Models\Article::factory(),
            'taxe_id' => \App\Models\Taxe::factory(),
        ];
    }
}
