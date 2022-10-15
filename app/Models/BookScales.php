<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookScales extends Model
{
    use HasFactory;
    protected $fillable = [
        'scale',
        'explain',
        'user_id',
        'book_id'
    ];
    public function rating()
    {
        return $this->hasMany(Rating::class);
    }
    public function getTotalrateAttribute()
    {
        $totalRate = 0;
        $ratings = $this->rating()->get();
        if (count($ratings) > 0) {
            foreach ($ratings as $rating) {
                $totalRate += $rating->rating;
            }
            $totalRate /= count($ratings);
        }
        return $totalRate;
    }
}