<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;
    protected $table = 'sub_categories';
    protected $fillable = [
        'name_en',
        'name_ar',
        'category_id'
    ];
    public function cats()
    {
        return $this->hasMany(BookCategory::class)->with('book');
    }

    public function parent()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
    public function is_containing($book_id)
    {
        if ($this->hasMany(BookCategory::class)->where('book_id', $book_id)->first()) {
            return true;
        }
        return false;
    }
    protected static function booted()
    {
        static::addGlobalScope('locale', function (Builder $builder) {
            $builder->select('id', 'name_' . app()->getLocale() . ' as name', 'category_id');
        });
    }
}