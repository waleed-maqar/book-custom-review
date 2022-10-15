@extends('layouts.template')
@section('page-title', 'Dashboard')
@section('style-file')
    <link rel="stylesheet" href="/assets/css/{{ app()->getlocale() }}/admin/controltables.css">
    <link rel="stylesheet" href="/assets/css/{{ app()->getlocale() }}/admin/adminindex.css">
    <link rel="stylesheet" href="/assets/css/{{ app()->getlocale() }}/pagination/ajaxpagination.css">
@endsection
@section('scripts')
    <script src="/assets/js/admin/ajaxpaginate.js"></script>
@endsection
@section('page-header')
    Admins Dashboard
@endsection
@section('page-content')
    <div class="ajax-data-container" data-ajaxurl="/dashboard/adminstable">
        @include('Admin.parts.admins.adminsindextable')
    </div>
@endsection
