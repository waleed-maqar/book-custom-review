<?php

namespace App\Http\Traits;

use App\Models\BookCategory;
use App\Models\BookScales;
use App\Models\Rating;
use App\Models\SubCategory;
use Illuminate\Support\Facades\Auth;

trait AddDetailsTrait
{
    /**
     * @param array $cats
     * @param int $book_id
     */
    public function addCategories(array $cats, int $book_id)
    {
        foreach ($cats as $category) {
            BookCategory::create([
                'sub_category_id' => $category,
                'book_id' => $book_id
            ]);
        }
    }
    /**
     * @param array $scales
     * @param int $book_id
     */
    public function addScales(array $scales, int $book_id)
    {
        foreach ($scales as $subscale) {
            if ($subscale['scale'] && $subscale['explain']) {
                $subscale['book_id'] = $book_id;
                $subscale['user_id'] = Auth::id();
                BookScales::create($subscale);
            }
        }
    }
    /**
     *
     */
    public function addRatings($scales, $review_id)
    {
        foreach ($scales as $scale => $rating) {
            Rating::create([
                'book_scales_id' => $scale,
                'review_id' => $review_id,
                'rating' => $rating,
            ]);
        }
    }
    /**
     *
     */
    public function addSubCategories($sub_cats, $cat_id)
    {
        foreach ($sub_cats as $sub_cat) {
            if (isset($sub_cat['name_en'])) {
                SubCategory::create(
                    [
                        'name_en' => $sub_cat['name_en'],
                        'name_ar' => $sub_cat['name_ar'],
                        'category_id' => $cat_id
                    ]
                );
            }
        }
    }
}