<?php

namespace Database\Factories;

use App\Models\Review;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ReviewLike>
 */
class ReviewLikeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $users = User::pluck('id')->toArray();
        $reviews = Review::pluck('id')->toArray();
        $actions = ['like', 'dislike'];
        return [
            'user_id' => $this->faker->randomElement($users),
            'review_id' => $this->faker->randomElement($reviews),
            'action' => $this->faker->randomElement($actions),
        ];
    }
}