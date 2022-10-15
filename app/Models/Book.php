<?php

namespace App\Models;

use App\Http\Traits\ratingTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Book extends Model
{
    use HasFactory, SoftDeletes, ratingTrait;
    protected $fillable = [
        'title',
        'about',
        'image',
        'user_id',
        'author_id'
    ];
    public function getPhotoAttribute()
    {
        $defaultPhoto = 'assets/img/books/default.jpg';
        return $this->image ?? $defaultPhoto;
    }
    public function getTotalrateAttribute()
    {
        $totalrate = 0;
        $scales = $this->scales()->get();
        if (count($scales) != 0) {
            foreach ($scales as $scale) {
                $totalrate += $scale->totalrate;
            }
            $totalrate /= count($scales);
        }
        return $totalrate;
    }
    public function getReviewedAttribute()
    {
        $reviews = $this->reviews()->where('user_id', Auth::id())->get();
        if (count($reviews) == 0) {
            return false;
        }
        return true;
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function author()
    {
        return $this->belongsTo(Author::class);
    }
    public function scales()
    {
        return $this->hasMany(BookScales::class)->with('rating');
    }
    public function categories()
    {
        return $this->hasMany(BookCategory::class);
    }
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
    public function reports()
    {
        return $this->hasMany(BookReports::class);
    }
}