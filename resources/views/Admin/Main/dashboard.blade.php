@extends('layouts.template')
@section('page-title', 'Dashboard')
@section('style-file')
    <link rel="stylesheet" href="/assets/css/{{ app()->getlocale() }}/admin/homepage.css">
    <link rel="stylesheet" href="/assets/css/{{ app()->getlocale() }}/pagination/ajaxpagination.css">
@endsection
@section('scripts')
    <script src="/assets/js/admin/ajaxpaginate.js"></script>
@endsection
@section('page-header')
    Site statistics
@endsection
@section('page-content')
    <div class="dashboard-container">
        <h3 class="text-center btn element-toggle-btn dashboard-card-title"
            data-element=".dashboard-users-card, #userUp, #userDown">
            Last Users
            <span id="userUp">
                <i class="fa-solid fa-angles-up"></i>
            </span>
            <span id="userDown" style="display: none;">
                <i class="fa-solid fa-angles-down"></i>
            </span>
        </h3>
        <div class="dashboard-users-container ajax-data-container" data-ajaxurl="{{ route('dashboardusers') }}">
            @include('Admin.parts.users.dashboardusers')
        </div>
        <h3 class="text-center btn element-toggle-btn dashboard-card-title"
            data-element=".dashboard-books-card, #bookUp, #bookDown">
            last Books
            <span id="bookUp" style="display: none;">
                <i class="fa-solid fa-angles-up"></i>
            </span>
            <span id="bookDown">
                <i class="fa-solid fa-angles-down"></i>
            </span>
        </h3>
        <div class="dashboard-books-container ajax-data-container" data-ajaxurl="{{ route('dashboardbooks') }}">
            @include('Admin.parts.books.dashboardbooks')
        </div>
        <h3 class="text-center btn element-toggle-btn dashboard-card-title"
            data-element=".dashboard-reviews-card, #reviewUp, #reviewDown">
            last Reviews
            <span id="reviewUp" style="display: none;">
                <i class="fa-solid fa-angles-up"></i>
            </span>
            <span id="reviewDown">
                <i class="fa-solid fa-angles-down"></i>
            </span>
        </h3>
        <div class="dashboard-reviews-container ajax-data-container" data-ajaxurl="{{ route('dashboardreviews') }}">
            @include('Admin.parts.reviews.dashboardreviews')
        </div>
    </div>
@endsection
