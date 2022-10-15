<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookReports extends Model
{
    use HasFactory;
    public function getActionClassAttribute()
    {
        return $this->action ?? 'not-seen';
    }
    public function book()
    {
        return $this->belongsTo(Book::class)->withTrashed();
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function report()
    {
        return $this->belongsTo(Report::class);
    }
    protected $fillable = [
        'book_id',
        'report_id',
        'user_id'
    ];
}