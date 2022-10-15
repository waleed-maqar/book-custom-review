<?php

namespace Database\Factories;

use App\Models\Report;
use App\Models\Review;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ReviewReport>
 */
class ReviewReportFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $reviews = Review::pluck('id')->toArray();
        $users = User::pluck('id')->toArray();
        $reports = Report::pluck('id')->toArray();
        return [
            'review_id' => $this->faker->randomElement($reviews),
            'user_id' => $this->faker->randomElement($users),
            'report_id' => $this->faker->randomElement($reports),
            'seen' => rand(0, 1),
            'action' => Null
        ];
    }
}