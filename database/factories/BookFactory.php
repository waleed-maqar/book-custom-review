<?php

namespace Database\Factories;

use App\Models\Author;
use App\Models\User;
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
        $usersIds = User::pluck('id')->toArray();
        $authorsIds = Author::pluck('id')->toArray();
        return [
            'title' => $this->faker->sentence(3),
            'about' => $this->faker->paragraph(7),
            'user_id' => $this->faker->randomElement($usersIds),
            'author_id' => $this->faker->randomElement($authorsIds)
        ];
    }
}