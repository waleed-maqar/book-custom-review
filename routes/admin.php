<?php

use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AdminBookController;
use App\Http\Controllers\Admin\AdminCategoryController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminMainController;
use App\Http\Controllers\Admin\AdminReportController;
use App\Http\Controllers\Admin\AdminReviewController;
use App\Http\Controllers\Admin\AdminUserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/**
 * -------------------------------------------
 * admin routes
 * -------------------------------------------
 * These route Are just allowed for whom registered in admins table
 */
Route::controller(AdminAuthController::class)->group(function () {
    Route::get('login', 'loginForm')->name('admin.login.form');
    Route::post('login', 'login')->name('admin.login');
    Route::get('logout', 'logout')->name('admin.logout');
});
Route::controller(AdminMainController::class)->group(function () {
    Route::get('/', 'dashboard')->name('dashboard');
    Route::get('dashboardusers', 'users')->name('dashboardusers');
    Route::get('dashboardbooks', 'books')->name('dashboardbooks');
    Route::get('dashboardreviews', 'reviews')->name('dashboardreviews');
});
Route::resource('/admin', AdminController::class, ['as' => 'dashboard']);
Route::get('adminstable', [AdminController::class, 'adminsTable']);
Route::resource('/user', AdminUserController::class, ['as' => 'dashboard']);
Route::controller(AdminUserController::class)->group(function () {
    Route::get('activeuserstable', 'activeUsers');
    Route::get('trasheduserstable', 'trashedUsers');
    Route::get('userreportstable/{user}', 'userReports');
});
Route::resource('/book', AdminBookController::class, ['as' => 'dashboard']);
Route::controller(AdminBookController::class)->group(function () {
    Route::get('activebookstable', 'activeBooks');
    Route::get('trashedbookstable', 'trashedBooks');
});
Route::resource('/review', AdminReviewController::class, ['as' => 'dashboard']);
Route::controller(AdminReviewController::class)->group(function () {
    Route::get('activereviewstable', 'activeReviews');
    Route::get('trashedreviewstable', 'trashedReviews');
});
Route::resource('/report', AdminReportController::class, ['as' => 'dashboard']);
Route::controller(AdminReportController::class)->group(function () {
    Route::get('bookreportstable', 'bookReports');
    Route::get('reviewreportstable', 'reviewReports');
});
Route::resource('/category', AdminCategoryController::class, ['as' => 'dashboard']);