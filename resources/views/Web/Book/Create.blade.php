@extends('layouts.template')
@section('page-title', 'New Book')
@section('page-header', 'Add New Book')
@section('style-file')
    <link rel="stylesheet" href="/assets/css/{{ app()->getlocale() }}/web/bookform.css">
@endsection
@section('page-content')
    <div class="book-add-update-form">
        <form action="{{ route('author.store') }}" method="Post" id="new-author-form" enctype="multipart/form-data">
            <span class="element-hide-btn new-author-form-hide-btn" data-element="#new-author-form">X</span>
            @csrf
            <div class="mb-2 form-group">
                <input type="text" name="name" class="form-control" placeholder="author" value="">
            </div>
            <div class="mb-2 form-group">
                <input type="file" name="image" class="form-control" id="" accept=".png, .jpg">
            </div>
            <div class="mb-2 form-group">
                <textarea name="about" class="form-control" cols="30" rows="2" placeholder="about"> </textarea>
            </div>
            <div class="mb-2 form-group">
                <input type="submit" value="Add author" class="form-control btn">
            </div>
        </form>
        <form action="{{ route('book.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-2 form-group">
                <input type="text" name="book[title]" class="form-control" placeholder="title"
                    value="{{ old('book.title') }}">
            </div>
            <div class="mb-2 form-group">
                <input type="file" name="book[image]" class="form-control">
            </div>
            <div class="mb-2 form-group">
                <input type="text" name="author_name" placeholder="Choose Author" class="form-control datalist-input"
                    id="bookauthorname" list="authors" data-inputvalue="#bookauthorid" data-datalist="#authors">
                <input type="hidden" name="book[author_id]" id="bookauthorid">
                <datalist id="authors">
                    @foreach ($authors as $author)
                        <option value="{{ $author->name }}">{{ $author->name }}</option>
                    @endforeach
                </datalist>
                <span class="btn btn-secondary btn-sm element-show-btn" data-element="#new-author-form">+ Add New
                    Author</span>
            </div>
            <div class="mb-2 form-group">
                <select name="parent-cats" class="form-control" id="chooseparentcat" data-action="new" data-book="0">
                    <option value="">Choose category</option>
                    @foreach ($categories as $category)
                        @if (count($category->subCats) > 0)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endif
                    @endforeach
                </select>
                <div id="choosesubcat" class="mb-2 form-group"></div>
            </div>
            <div class="mb-2 form-group">
                <textarea name="book[about]" class="form-control" id="" cols="30" rows="10" placeholder="about">{{ old('book.about') }}</textarea>
            </div>
            <div class="mb-2 Create-book-scales">
                <h3>Book Scales</h3>
                @for ($i = 1; $i <= 3; $i++)
                    <div class="form-group">
                        <input type="text" name="scales[{{ $i }}][scale]" id=""
                            value="{{ old("scales.$i.scale") }}" placeholder="scale" class="form-control">
                        <textarea name="scales[{{ $i }}][explain]" id="" placeholder="Explain scale" class="form-control">{{ old("scales.$i.explain") }}</textarea>
                    </div>
                @endfor
                <span class="btn btn-secondary add-another-scale" data-nextscale="4">
                    +Add Another Scale
                </span>
            </div>
            <div class="">
                <input type="submit" value="Add Book" class="btn btn-primary">
            </div>
        </form>
    </div>
@endsection
