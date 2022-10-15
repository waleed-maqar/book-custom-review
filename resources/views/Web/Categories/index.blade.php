@extends('layouts.template')
@section('page-title', 'Categories')
@section('style-file')
    <link rel="stylesheet" href="/assets/css/{{ app()->getlocale() }}/web/catindex.css">
    <link rel="stylesheet" href="/assets/css/{{ app()->getlocale() }}/pagination/mainpagination.css">
@endsection
@section('page-header')
    Main Categories index
@endsection
@section('page-content')
    <div class="">
        {{ $categories->render('pagination.main.mainpaginator') }}
    </div>
    <div class="cats-container">
        @forelse ($categories as $category)
            <div class="main-cat-card">
                <h3 class="text-center main-cat-card-title">
                    <a href="{{ route('category.show', $category->id) }}">
                        {{ $category->name }}
                    </a>
                </h3>
                @forelse ($category->children->take(3) as $subcategory)
                    <div class="mb-1 sub-cat-card">
                        @include('Web.parts.category.subcategory')
                    </div>
                @empty
                @endforelse
            </div>
        @empty
        @endforelse
    </div>
@endsection
