<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class SubCategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $categoris = Category::pluck('id')->toArray();
        return [
            'category_id' => $this->faker->randomElement($categoris),
            'name_en' => $this->faker->unique()->word(),
            'name_ar' => $this->faker->unique()->word(),
        ];
    }
}