@extends('layouts.template')
@section('page-title', excerpt($book->title, 14, true))
@section('style-file')
    <link rel="stylesheet" href="/assets/css/{{ app()->getlocale() }}/web/singlebook.css">
    <link rel="stylesheet" href="/assets/css/{{ app()->getlocale() }}/web/rating.css">
    <link rel="stylesheet" href="/assets/css/{{ app()->getlocale() }}/web/report.css">
    <link rel="stylesheet" href="/assets/css/{{ app()->getlocale() }}/web/scales.css">
    <link rel="stylesheet" href="/assets/css/{{ app()->getlocale() }}/web/reviews.css">
@endsection
@section('page-header')
    <h1 class="mt-3 book-title">
        {{ $book->title }}
    </h1>
@endsection
@section('page-content')
    <div class="book-container">
        <div class="mb-3 book-card">
            @include('Web.parts.book.showbook')
        </div>
        <div class="add-report add-book-report">
            @include('Web.parts.reports.addbookreport')
        </div>
        <div class="single-book-reviews">
            <h3 class="text-center">
                Book reviews
            </h3>
            @auth
                @if (!$book->reviewed)
                    <div class="m-3 single-book-add-review">
                        @include('Web.parts.review.addreview')
                    </div>
                @endif
            @endauth
            <div class="add-review-report"></div>
            @forelse ($reviews as $review)
                <div class="mb-1 single-book-single-review-card" id="singlebookreview-{{ $review->id }}">
                    @include('Web.parts.review.singlereview', ['review' => $review])
                </div>
            @empty
            @endforelse
        </div>
    </div>
@endsection
