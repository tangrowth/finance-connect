<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->word(),
            'content' => $this->faker->text(300),
            'month' => $this->faker->numberBetween(1, 10),
            'amount' => $this->faker->numberBetween(1, 200), 
            'difficulty' => $this->faker->numberBetween(1, 5),
            'user_id' => $this->faker->numberBetween(1, 10),
            'way_id' => $this->faker->numberBetween(1, 5),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
