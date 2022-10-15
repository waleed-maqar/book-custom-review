<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Review;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdminMainController extends Controller
{
    public $users;
    public $books;
    public $reviews;
    public function __construct()
    {
        $this->middleware('admin');
        $this->users = User::whereDate('created_at', '>=', Carbon::now()->subDays(3))->paginate(5);
        $this->books = Book::whereDate('created_at', '>=', Carbon::now()->subDays(3))->paginate(5);
        $this->reviews = Review::whereDate('created_at', '>=', Carbon::now()->subDays(3))->paginate(5);
    }
    public function dashBoard()
    {
        $users = $this->users;
        $books = $this->books;
        $reviews = $this->reviews;
        return view('Admin.Main.dashboard', compact(['users', 'books', 'reviews']));
    }
    public function users()
    {
        $users = $this->users;
        return view('Admin.parts.users.dashboardusers', compact(['users']));
    }
    public function books()
    {
        $books = $this->books;
        return view('Admin.parts.books.dashboardbooks', compact(['books']));
    }
    public function reviews()
    {
        $reviews = $this->reviews;
        return view('Admin.parts.reviews.dashboardreviews', compact(['reviews']));
    }
}