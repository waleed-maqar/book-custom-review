@extends('layouts.template')
@section('page-title', 'Books')
@section('style-file')
    <link rel="stylesheet" href="/assets/css/{{ app()->getlocale() }}/web/homepage.css">
    <link rel="stylesheet" href="/assets/css/{{ app()->getlocale() }}/web/bookindex.css">
    <link rel="stylesheet" href="/assets/css/{{ app()->getlocale() }}/pagination/mainpagination.css">
@endsection
@section('page-header')
    Book Index
@endsection
@section('page-content')
    <div class="mb-3 books-pagination">
        {{ $books->render('pagination.main.mainPaginator') }}
    </div>
    <div class="books-container">
        @forelse ($books as $book)
            <div class="book-card">
                @include('Web.parts.book.singlebook', ['pagename' => 'index'])
            </div>
        @empty
        @endforelse
    </div>
@endsection
