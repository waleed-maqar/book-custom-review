<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WEB\AuthorController;
use App\Http\Controllers\WEB\BookController;
use App\Http\Controllers\WEB\BookRePortController;
use App\Http\Controllers\WEB\CategoryController;
use App\Http\Controllers\WEB\LikeController;
use App\Http\Controllers\WEB\MainController;
use App\Http\Controllers\WEB\ReviewController;
use App\Http\Controllers\WEB\ReviewRePortController;
use App\Http\Controllers\WEB\ScaleController;
use App\Http\Controllers\Web\SocialLoginController;
use App\Http\Controllers\WEB\UserController;
use App\Models\Book;
use App\Models\BookScales;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [MainController::class, 'Home'])->name('home_page');

// Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// USers
Route::resource('user', UserController::class)->except(['create', 'index']);
Route::controller(UserController::class)->group(function () {
    Route::get('register', 'create')->name('user.Create');
    Route::get('login', 'loginForm')->name('web.login.form');
    Route::post('login', 'login')->name('User.login');
});
Route::get('logout', function () {
    Auth::logout();
    Auth::guard('admin')->logout();
    return redirect('login');
})->name('user.logout');
//Social login
Route::get('redirect/{provider}', function ($provider) {
    return Socialite::driver($provider)->redirect();
});
Route::get('callback/{provider}', [SocialLoginController::class, 'store'])->name('social.login');
// Books
Route::resource('book', BookController::class);
Route::get('books/seacrh', [BookController::class, 'search'])->name('book.search');
Route::get('cats', function () {
    $cats = Category::with('books')->get();
    dd($cats);
});
// Categories
Route::resource('category', CategoryController::class);
Route::get('sub-category/{cat}', [CategoryController::class, 'showsub'])->name('subcat.show');
// scales
Route::controller(ScaleController::class)->group(function () {
    Route::put('scale/{book}', 'store')->name('scale.store');
});
// Reviews
Route::group(['prefix' => 'book/{book}'], function () {
    Route::resource('review', ReviewController::class);
    Route::controller(BookRePortController::class)->group(function () {
        Route::get('report', 'store')->name('book.report');
    });
});
// Authors
Route::resource('author', AuthorController::class);
// Review likes
Route::group(['prefix' => 'review/{review}'], function () {
    Route::controller(LikeController::class)->group(function () {
        Route::get('add/{action}', 'store')->name('like.store');
    });
    Route::controller(ReviewRePortController::class)->group(function () {
        Route::get('report', 'store')->name('review.report');
    });
});
// review reports
Route::get('reviewreport', [ReviewRePortController::class, 'create']);

Route::get('choosesubcat/{cat}/{action}', function (Request $request, $id, $action) {
    // dd($request);
    $category = Category::find($id);
    $book = null;
    if ($request->book != 0) {
        $book = Book::find($request->book);
    }
    return view('Web.parts.category.subcategoryselect', compact(['category', 'action', 'book']));
});