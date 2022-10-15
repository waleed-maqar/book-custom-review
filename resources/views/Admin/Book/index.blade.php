@extends('layouts.template')
@section('page-title', 'Dashboard')
@section('style-file')
    <link rel="stylesheet" href="/assets/css/{{ app()->getlocale() }}/admin/controltables.css">
    <link rel="stylesheet" href="/assets/css/{{ app()->getlocale() }}/pagination/ajaxpagination.css">
@endsection
@section('scripts')
    <script src="/assets/js/admin/ajaxpaginate.js"></script>
@endsection
@section('page-header')
    Books Dashboard
@endsection
@section('page-content')
    <div class="ajax-data-container" data-ajaxurl="/dashboard/activebookstable">
        @include('Admin.parts.books.booksindexactivetable')
    </div>
    <h3>Trashed Books</h3>
    <div class="ajax-data-container" data-ajaxurl="/dashboard/trashedbookstable">
        @include('Admin.parts.books.booksindextrashedtable')
    </div>
@endsection
