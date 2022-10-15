<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Review extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'title', 'review', 'user_id', 'book_id'
    ];
    //
    public function dislikes()
    {
        return $this->hasMany(ReviewLike::class)->where('action', 'dislike');
    }
    //
    public function likes()
    {
        return $this->hasMany(ReviewLike::class)->where('action', 'like');
    }
    public function getLikedAttribute()
    {
        $likes = $this->likes()->where('user_id', Auth::id())->get();
        if (count($likes) == 0) {
            return false;
        }
        return true;
    }
    public function getdislikedAttribute()
    {
        $dislikes = $this->dislikes()->where('user_id', Auth::id())->get();
        if (count($dislikes) == 0) {
            return false;
        }
        return true;
    }
    //
    public function getRatingAttribute()
    {
        $likes = count($this->likes()->get());
        $dislikes = count($this->dislikes()->get());
        return $likes - $dislikes;
    }
    public function reports()
    {
        return $this->hasMany(ReviewReport::class);
    }
    public function book()
    {
        return $this->belongsTo(Book::class)->withTrashed();
    }
    public function user()
    {
        return $this->belongsTo(User::class)->withTrashed();
    }
}