@extends('layouts.template')
@section('page-title', $category->name)
@section('style-file')
    <link rel="stylesheet" href="/assets/css/{{ app()->getlocale() }}/web/homepage.css">
    <link rel="stylesheet" href="/assets/css/{{ app()->getlocale() }}/web/bookindex.css">
    <link rel="stylesheet" href="/assets/css/{{ app()->getlocale() }}/pagination/mainpagination.css">
@endsection
@section('page-header')
    <h4>
        {{ $category->name }} ....\ <a href="{{ route('category.show', $category->parent->id) }}"
            style="color: springgreen;">{{ $category->parent->name }}</a>
    </h4>
@endsection
@section('page-content')
    <div class="mb-3 books-pagination">
        {{ $cats->render('pagination.main.mainPaginator') }}
    </div>
    <div class="books-container">
        @forelse ($cats as $cat)
            <div class="book-card">
                @include('Web.parts.book.singlebook', ['pagename' => 'index', 'book' => $cat->book])
            </div>
        @empty
        @endforelse
    </div>
@endsection
