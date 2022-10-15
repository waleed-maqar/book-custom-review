<?php

namespace Database\Factories;

use App\Models\Book;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class BookScalesFactory extends Factory
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
            'scale' => $this->faker->sentence(3),
            'explain' => $this->faker->paragraph(1, false),
            'book_id' => $this->faker->randomElement($books),
            'user_id' => $this->faker->randomElement($users),
        ];
    }
}