@extends('layouts.template')
@section('page-title', excerpt($book->title, 8, 1))
@section('page-header')
    {{ $book->title }} Info Edit
@endsection
@section('style-file')
    <link rel="stylesheet" href="/assets/css/{{ app()->getlocale() }}/web/bookform.css">
@endsection
@section('page-content')
    <form action="{{ route('author.store') }}" method="Post" id="new-author-form">
        <span class="element-hide-btn new-author-form-hide-btn" data-element="#new-author-form">X</span>
        @csrf
        <div class="mb-2 form-group">
            <input type="text" name="name" class="form-control" placeholder="author" value="">
        </div>
        <div class="mb-2 form-group">
            <input type="file" name="image" class="form-control" id="" accept=".png, .jpg">
        </div>
        <div class="mb-2 form-group">
            <textarea name="about" class="form-control" cols="30" rows="2" placeholder="about"></textarea>
        </div>
        <div class="mb-2 form-group">
            <input type="submit" value="Add author" class="form-control">
        </div>
    </form>
    <div class="book-add-update-form">
        <form action="{{ route('book.update', $book->id) }}" method="POST" enctype="multipart/form-data">
            <div class="row">
                @csrf @method('PUT')
                <div class="mb-2 form-group">
                    <input type="text" name="book[title]" class="form-control" placeholder="name"
                        value="{{ $book->title }}">
                </div>
                <div class="">
                    <input type="file" name="book[image]" class="form-control" id="" placeholder="image"
                        accept=".png, .jpg">
                </div>
                <div class="mb-2 form-group">
                    <div class="mb-2 form-group">
                        <input type="text" name="author_name" placeholder="Choose Author" class="form-control"
                            id="bookauthorname" list="authors" value="{{ $book->author->name }}">
                        <input type="hidden" name="book[author_id]" id="bookauthorid" value="{{ $book->author_id }}">
                        <datalist id="authors">
                            @foreach ($authors as $author)
                                <option value="{{ $author->name }}">{{ $author->id }}</option>
                            @endforeach
                        </datalist>
                        <span class="btn btn-secondary btn-sm element-show-btn" data-element="#new-author-form">+ Add New
                            Author</span>
                    </div>
                </div>
                <div class="mb-2 form-group">
                    <select name="parent-cats" class="form-control" id="chooseparentcat" data-action="update"
                        data-book="{{ $book->id }}">
                        <option value="">Choose category</option>
                        @foreach ($categories as $category)
                            @if (count($category->children) > 0)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endif
                        @endforeach
                    </select>
                    <div id="choosesubcat" class="mb-2 form-group">
                        <select name="categories[]" class="form-control" multiple>
                            @forelse ($book->categories as $cat)
                                <option value="{{ $cat->category()->id }}" selected class="mb-1">
                                    {{ $cat->category()->name }}</option>
                            @empty
                            @endforelse
                        </select>
                    </div>
                </div>
                <div class="mb-2 form-group">
                    <textarea name="book[about]" class="form-control" id="" cols="30" rows="10" placeholder="about">{{ $book->about }}</textarea>
                </div>
                <div class="mb-2 form-group">
                    <input type="submit" value="Update Book" class="btn btn-primary form-control">
                </div>
            </div>
        </form>
    </div>
@endsection
