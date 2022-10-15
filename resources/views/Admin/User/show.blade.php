@extends('layouts.template')
@section('page-title', 'Dashboard')
@section('style-file')
    <link rel="stylesheet" href="/assets/css/{{ app()->getlocale() }}/admin/controltables.css">
    <link rel="stylesheet" href="/assets/css/{{ app()->getlocale() }}/admin/userindex.css">
    <link rel="stylesheet" href="/assets/css/{{ app()->getlocale() }}/pagination/ajaxpagination.css">
    <link rel="stylesheet" href="/assets/css/{{ app()->getlocale() }}/admin/singleuser.css">
@endsection
@section('scripts')
    <script src="/assets/js/admin/ajaxpaginate.js"></script>
@endsection
@section('page-header')
    {{ $user->user_name }} Dashboard
@endsection
@section('page-content')
    <div class="m-3 user-control-form">
        @include('Admin.parts.users.singleuserforms')
    </div>
    <div class="ajax-data-container" data-ajaxurl="/dashboard/userreportstable/{{ $user->id }}">
        @include('Admin.parts.users.userreportstable')
    </div>
@endsection
