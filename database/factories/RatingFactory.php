<?php

namespace Database\Factories;

use App\Models\BookScales;
use App\Models\Review;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Rating>
 */
class RatingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $scales = BookScales::pluck('id')->toArray();
        $reviews = Review::pluck('id')->toArray();
        return [
            'book_scales_id' => $this->faker->randomElement($scales),
            'review_id' => $this->faker->randomElement($reviews),
            'rating' => rand(1, 5),
        ];
    }
}