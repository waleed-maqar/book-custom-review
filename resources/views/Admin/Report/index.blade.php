@extends('layouts.template')
@section('page-title', 'Dashboard')
@section('style-file')
    <link rel="stylesheet" href="/assets/css/{{ app()->getlocale() }}/admin/controltables.css">
    <link rel="stylesheet" href="/assets/css/{{ app()->getlocale() }}/pagination/ajaxpagination.css">
    <link rel="stylesheet" href="/assets/css/{{ app()->getlocale() }}/admin/reportindex.css">
@endsection
@section('scripts')
    <script src="/assets/js/admin/ajaxpaginate.js"></script>
@endsection
@section('page-header')
    Reports Dashboard
@endsection
@section('page-content')
    <h4>
        Book reports
    </h4>
    <div class="ajax-data-container" data-ajaxurl="/dashboard/bookreportstable">
        @include('Admin.parts.reports.bookreportstable')
    </div>
    <h4>
        review reports
    </h4>
    <div class="ajax-data-container" data-ajaxurl="/dashboard/reviewreportstable">
        @include('Admin.parts.reports.reviewreportstable')
    </div>
@endsection
