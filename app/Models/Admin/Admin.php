<?php

namespace App\Models\Admin;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Admin extends Authenticatable
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'email',
        'password',
        'role'
    ];

    //
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function getNameAttribute()
    {
        return $this->user()->first()->user_name;
    }
}