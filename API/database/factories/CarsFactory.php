<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class CarsFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => $this->faker->word,
            'model' => $this->faker->word,
            'color' => $this->faker->word,
            'year' => $this->faker->randomNumber()
        ];
    }
}
