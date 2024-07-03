<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Number;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class TarrifFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->company(),
            'type' => fake()->numberBetween(1, 2),
            'baseCost' => Number::clamp(fake()->numberBetween(5, 100), min: 5, max: 100),
            'includedKwh' => Number::clamp((fake()->numberBetween(1, 20)*500), min: 500, max: 10000),
            'additionalKwhCost' => Number::format(fake()->randomFloat(2, 10, 100), precision: 2),
        ];
    }
}
