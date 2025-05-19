<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CarFactory extends Factory
{
    public function definition(): array
    {
        $carTypes = ['SUV', 'Sedan', 'Hatchback', 'Coupe', 'Convertible', 'Minivan', 'Pickup'];
        
        return [
            'name' => $this->faker->word(),
            'brand' => $this->faker->company(),
            'model' => $this->faker->word(),
            'year' => $this->faker->numberBetween(2010, 2023),
            'car_type' => $this->faker->randomElement($carTypes),
            'daily_rent_price' => $this->faker->numberBetween(50, 300),
            'availability' => $this->faker->boolean(80),
            'image' => 'car-images/default.jpg',
        ];
    }
}