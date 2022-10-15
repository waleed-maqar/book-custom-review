@extends('layouts.template')
@section('page-title', $category->name)
@section('style-file')
    <link rel="stylesheet" href="/assets/css/{{ app()->getlocale() }}/web/catindex.css">
    <link rel="stylesheet" href="/assets/css/{{ app()->getlocale() }}/web/singlecat.css">
@endsection
@section('page-header')
    {{ $category->name }}
@endsection
@section('page-content')
    @forelse ($category->children as $subcategory)
        <div class="mb-2 sub-cat-card">
            @include('Web.parts.category.subcategory')
        </div>
    @empty
    @endforelse
@endsection
