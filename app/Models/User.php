<?php

namespace App\Models;

use App\Http\Traits\MakeAdminTrait;
use App\Models\Admin\Admin;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, SoftDeletes, Notifiable, MakeAdminTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_name',
        'email',
        'password',
        'about',
        'image',
        'register_via'
    ];
    /**
     * Books
     */
    public function Books()
    {
        return $this->hasMany(Book::class);
    }
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
    public function reportedBooks()
    {
        return $this->hasManyThrough(BookReports::class, Book::class);
    }
    public function reportedReviews()
    {
        return $this->hasManyThrough(ReviewReport::class, Review::class);
    }
    public function reports()
    {
        return $this->reportedBooks()->get()->merge($this->reportedReviews()->get());
    }
    public function getReportscountAttribute()
    {
        return count($this->reports());
    }
    //
    public function getProfileAttribute()
    {
        $defaultImage = "assets/img/users/default.jpg";
        return $this->image ?? $defaultImage;
    }
    /**
     * @param string $role
     */
    public function makeAdmin($role = 'moderator')
    {
        $this->addToAdmins($role);
        return true;
    }
    public function deleteAdmin()
    {
        $admin = $this->adminAccount()->first();
        if ($admin) {
            $this->removeFromAdmins($admin->id);
        }
        return true;
    }
    //
    public function adminAccount()
    {
        return $this->hasOne(Admin::class, 'user_id');
    }
    public function getIsAdminAttribute()
    {
        return $this->adminAccount()->first() ? true : false;
    }
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}