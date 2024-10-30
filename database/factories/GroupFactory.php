<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Group>
 */
class GroupFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'field_id'=>fake()->numberBetween(1,20),
            'name'=>fake()->word() . ' Group',
            'course_id'=>fake()->numberBetween(1,4)
        ];
    }
}
