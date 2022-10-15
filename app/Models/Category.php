<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'name_en',
        'name_ar',
    ];
    public function children()
    {
        return $this->hasMany(SubCategory::class)->has('cats');
    }
    public function subCats()
    {
        return $this->hasMany(SubCategory::class);
    }
    //
    public function cats()
    {
        return $this->hasMany(BookCategory::class, 'category_id', 'id');
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
            $builder->select('id', 'name_' . app()->getLocale() . ' as name');
        });
    }
}