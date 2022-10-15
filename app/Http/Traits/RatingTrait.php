<?php

namespace App\Http\Traits;

use App\Models\BookScales;
use App\Models\Rating;
use App\Models\Review;
use Illuminate\Database\Eloquent\Collection;
use PhpParser\Node\Expr\Cast\Double;

trait ratingTrait
{
    public function ratings()
    {
        return $this->hasManyThrough(Rating::class, Review::class);
    }
    public function totalRate(): float
    {
        $total = 0;
        $ratings = $this->ratings()->get();
        if (count($ratings) != 0) {
            foreach ($ratings as $rating) {
                $total += $rating->rating;
            }
            $total /= count($ratings);
        }
        return round($total, 2);
    }
}