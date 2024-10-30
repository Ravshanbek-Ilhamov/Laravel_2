<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'=>fake()->name(),
            'group_id'=>fake()->numberBetween(1,20),
            'phone_number'=>fake()->phoneNumber(),
            'image_path'=>fake()->imageUrl(),
            'location_id'=>fake()->numberBetween(1,20),
        ];
    }
}
