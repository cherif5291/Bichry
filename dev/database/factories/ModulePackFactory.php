<?php

namespace Database\Factories;

use App\Models\ModulePack;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class ModulePackFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ModulePack::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'package_id' => \App\Models\Package::factory(),
            'module_id' => \App\Models\Module::factory(),
        ];
    }
}
