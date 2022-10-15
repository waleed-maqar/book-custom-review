@extends('layouts.template')
@section('page-title', 'Home page')
@section('style-file')
    <link rel="stylesheet" href="/assets/css/{{ app()->getlocale() }}/admin/login.css">
@endsection
@section('page-header')
    Admin login
@endsection
@section('page-content')
    <div class="admin-login-form">
        <form action="{{ route('admin.login') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @guest
                <div class="mt-1 form-group">
                    <input type="email" name="email" class="form-control" id="" placeholder="email"
                        value="{{ old('email') }}">
                </div>
            @endguest
            <div class="mt-1 form-group">
                <input type="password" name="password" class="form-control" placeholder="password" autocomplete="off">
            </div>
            <div class="mt-1 form-group">
                <input type="submit" value="Login" class="btn btn-success form-control">
            </div>
        </form>
    </div>
@endsection
