<?php

namespace Database\Factories;

use App\Models\Book;
use App\Models\Report;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use phpDocumentor\Reflection\Types\Null_;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class BookReportsFactory extends Factory
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
        $reports = Report::pluck('id')->toArray();
        return [
            'book_id' => $this->faker->randomElement($books),
            'user_id' => $this->faker->randomElement($users),
            'report_id' => $this->faker->randomElement($reports),
            'seen' => rand(0, 1),
            'action' => Null
        ];
    }
}