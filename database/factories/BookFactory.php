<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => str(fake()->words(4, true))->title(),
            'genre' => fake()->randomElement(['Fantasy', 'Science Fiction', 'Mystery', 'Romance', 'Thriller', 'Horror']),
            'stock' => fake()->randomDigit(),
        ];
    }
}
