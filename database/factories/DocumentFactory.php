<?php

namespace Database\Factories;

use App\Models\Document;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class DocumentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Document::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'doc' => $this->faker->text,
            'cabinet_id' => $this->faker->randomNumber(0),
            'entreprise_id' => \App\Models\Entreprise::factory(),
            'documents_type_id' => \App\Models\DocumentsType::factory(),
        ];
    }
}
