@extends('layouts.template')
@section('page-header')
    home page
@endsection
@section('page-content')
    <div id="new-category-form" style="display: none">
        <form action="{{ route('dashboard.category.store') }}" method="POST">
            @csrf
            <input type="text" name="name_en" placeholder="Cat english name">
            <input type="text" name="name_ar" placeholder="cat arabic name">
            <input type="submit" name="add_main_cat" value="Add Main Category">
        </form>
    </div>
    <form action="{{ route('dashboard.category.store') }}" method="POST">
        @csrf
        <div class="mb-2 form-group">
            <input type="text" name="Category_name" placeholder="Choose Main Category"
                class="form-control datalist-input" id="categoryname" list="categories" data-inputvalue="#categoryId"
                data-datalist="#categories">
            <input type="hidden" name="category_id" id="categoryId">
            <datalist id="categories">
                @foreach ($categories as $category)
                    <option value="{{ $category->name }}">{{ $category->id }}</option>
                @endforeach
            </datalist>
            <span class="btn btn-secondary btn-sm element-show-btn" data-element="#new-category-form">+ Add New
                Category</span>
        </div>
        @for ($i = 1; $i <= 2; $i++)
            <div>
                <input type="text" name="sub_cat[{{ $i }}][name_en]" placeholder="sub cat english name">
                <input type="text" name="sub_cat[{{ $i }}][name_ar]" placeholder="sub cat arabic name">
            </div>
        @endfor
        </div>
        <input type="submit" value="Add Sub-Categories">
    </form>
@endsection
