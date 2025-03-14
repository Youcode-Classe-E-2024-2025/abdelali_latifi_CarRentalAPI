<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Rentals;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Rentals>
 */
class RentalsFactory extends Factory
{
    protected $model = Rentals::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            
            'car_id'=> '1',
            'from' => $this->faker->date(),
            'to' => $this->faker->date(),
            'total_price' => $this->faker->randomNumber(2),
        ];
    }
}
