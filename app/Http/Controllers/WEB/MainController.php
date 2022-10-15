<?php

namespace App\Http\Controllers\WEB;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    public function Home()
    {
        $books = Book::withCount('reviews')->orderBy('reviews_count', 'desc')->take(5)->get();
        return view('HomePage', compact(['books']));
    }
}