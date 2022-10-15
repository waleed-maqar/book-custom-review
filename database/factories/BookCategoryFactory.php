<?php

namespace Database\Factories;

use App\Models\Book;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BookCategory>
 */
class BookCategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $books = Book::pluck('id')->toArray();
        $categories = SubCategory::pluck('id')->toArray();
        return [
            'book_id' => $this->faker->randomElement($books),
            'sub_category_id' => $this->faker->randomElement($categories),
        ];
    }
}