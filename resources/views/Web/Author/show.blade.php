@extends('layouts.template')
@section('page-title', excerpt($author->name, 8, true))
@section('style-file')
    <link rel="stylesheet" href="/assets/css/{{ app()->getlocale() }}/web/homepage.css">
    <link rel="stylesheet" href="/assets/css/{{ app()->getlocale() }}/web/bookindex.css">
    <link rel="stylesheet" href="/assets/css/{{ app()->getlocale() }}/web/authorindex.css">
    <link rel="stylesheet" href="/assets/css/{{ app()->getlocale() }}/pagination/mainpagination.css">
@endsection
@section('page-header')
    <h4>
        {{ $author->name }}
    </h4>
@endsection
@section('page-content')
    <p class="author-card-about">
        {{ $author->about }}
    </p>
    <div class="mb-3 books-pagination">
        {{ $books->render('pagination.main.mainPaginator') }}
    </div>
    <div class="books-container">
        @forelse ($books as $book)
            <div class="book-card">
                @include('Web.parts.book.singlebook', ['pagename' => 'index', 'book' => $book])
            </div>
        @empty
        @endforelse
    </div>
@endsection
