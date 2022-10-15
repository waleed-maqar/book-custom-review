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
    New Report Policy
@endsection
@section('page-content')
    <form action="{{ route('dashboard.report.store') }}" method="Post">
        @csrf
        <div class="">
            <input type="text" name="reason" id="">
        </div>
        <div class="">
            <textarea name="explain"></textarea>
        </div>
        <div class="">
            <input type="submit" value="Add Policy">
        </div>
    </form>
@endsection
