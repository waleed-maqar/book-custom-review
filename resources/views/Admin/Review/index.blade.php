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
    Reviews Dashboard
@endsection
@section('page-content')
    <h3>Active reviews</h3>
    <div class="ajax-data-container" data-ajaxurl="/dashboard/activereviewstable">
        @include('Admin.parts.reviews.reviewsindexactivetable')
    </div>
    <h3>Trashed reviews</h3>
    <div class="ajax-data-container" data-ajaxurl="/dashboard/trashedreviewstable">
        @include('Admin.parts.reviews.reviewsindextrashedtable')
    </div>
@endsection
