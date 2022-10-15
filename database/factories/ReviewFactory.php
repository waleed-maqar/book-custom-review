<?php

namespace Database\Factories;

use App\Models\Book;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Review>
 */
class ReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $books = Book::pluck('id')->toArray();
        $users = User::pluck('id')->toArray();
        return [
            'book_id' => $this->faker->randomElement($books),
            'user_id' => $this->faker->randomElement($users),
            'title' => $this->faker->sentence(4),
            'review' => $this->faker->paragraph(6)
        ];
    }
}