@extends('layouts.template')
@section('page-title', 'Dashboard')
@section('style-file')
    <link rel="stylesheet" href="/assets/css/{{ app()->getlocale() }}/admin/controltables.css">
    <link rel="stylesheet" href="/assets/css/{{ app()->getlocale() }}/admin/userindex.css">
    <link rel="stylesheet" href="/assets/css/{{ app()->getlocale() }}/pagination/ajaxpagination.css">
@endsection
@section('scripts')
    <script src="/assets/js/admin/ajaxpaginate.js"></script>
@endsection
@section('page-header')
    Users Dashboard
@endsection
@section('page-content')
    <h3>
        Active users
    </h3>
    <div class="ajax-data-container" data-ajaxurl="/dashboard/activeuserstable">
        @include('Admin.parts.users.usersidexactivetable')
    </div>
    @if (count($trashedUsers) > 0)
        <h3>
            Trashed users
        </h3>
        <div class="ajax-data-container" data-ajaxurl="/dashboard/trasheduserstable">
            @include('Admin.parts.users.usersindextrashedtable')
        </div>
    @endif
@endsection
