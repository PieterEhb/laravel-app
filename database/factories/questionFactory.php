<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\userinfo>
 */
class questionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'question' => fake()->paragraph(1),
            'response' => fake()->paragraph(1),
            'category_id' => 1,
            'status' => fake()->randomElement(['shown' , 'notShown'])
        ];
    }
}
