@extends('layouts.template')
@section('page-title', 'Authors')
@section('style-file')
    <link rel="stylesheet" href="/assets/css/{{ app()->getlocale() }}/web/authorindex.css">
    <link rel="stylesheet" href="/assets/css/{{ app()->getlocale() }}/pagination/mainpagination.css">
@endsection
@section('page-header')
    Authors index
@endsection
@section('page-content')
    <div class="mb-3 authors-pagination">
        {{ $authors->render('pagination.main.mainPaginator') }}
    </div>
    <div class="authors-container">
        @forelse ($authors as $author)
            <div class="author-card">
                <h3 class="text-center author-card-title">
                    <a href="{{ route('author.show', $author->id) }}" style="color: blue;">
                        {{ excerpt($author->name, 12, true) }}
                    </a>
                </h3>
                <p class="author-card-about">
                    {{ excerpt($author->about, 55, true) }}
                </p>
                @forelse ($author->books->take(5) as $book)
                    <div class="author-card-single-book">
                        <a href="{{ route('book.show', $book->id) }}">{{ $book->title }}</a>
                    </div>
                @empty
                @endforelse
                @if (count($author->books) != 0)
                    <a href="{{ route('author.show', $author->id) }}" class="author-card-show-link"> show more books by
                        {{ $author->name }}</a>
                @endif
            </div>
        @empty
        @endforelse
    </div>
@endsection
