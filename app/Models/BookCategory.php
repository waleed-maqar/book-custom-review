<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'sub_category_id',
        'book_id'
    ];
    public function category()
    {
        return $this->belongsTo(SubCategory::class, 'sub_category_id')->first();
    }
    public function book()
    {
        return $this->belongsTo(Book::class, 'book_id', 'id');
    }
    protected static function booted()
    {
        static::addGlobalScope('withouttrashed', function (Builder $builder) {
            $builder->has('book');
        });
    }
}