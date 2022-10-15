@extends('layouts.template')
@section('page-title', 'Home page')
@section('style-file')
    <link rel="stylesheet" href="/assets/css/{{ app()->getlocale() }}/web/homepage.css">
@endsection
@section('page-header')
    home page
@endsection
@section('page-content')
    <div class="container">
        <div class="books-container">
            <h2 class="books-container-title">Most Reviewd Books</h2>
            @forelse ($books as $book)
                @include('Web.parts.book.singlebook', ['pagename' => 'homepage'])
                <hr>
            @empty
                <div class="No-books-yet">
                    THere Are No Books Yet!
                </div>
            @endforelse
        </div>
        @if (count($books) != 0)
            <div class="see-more-books">
                <a href="{{ route('book.index') }}" class="see-more-books-link">
                    See More Books
                </a>
            </div>
        @endif
    </div>
@endsection
