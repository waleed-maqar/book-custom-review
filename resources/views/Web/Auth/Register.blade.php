@extends('layouts.template')
@section('page-title', 'Register')
@section('page-header', 'User Register')
@section('style-file')
    <link rel="stylesheet" href="/assets/css/{{ app()->getlocale() }}/web/auth.css">
@endsection
@section('page-content')
    <div class="container">
        <div class="login-register-form">
            <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group mb-1 custom-form-group">
                    <input type="text" name="user_name" class="form-control" placeholder="name"
                        value="{{ old('user_name') }}">
                </div>
                <div class="form-group mb-1 custom-form-group">
                    <input type="email" name="email" class="form-control" id="" placeholder="email"
                        value="{{ old('email') }}">
                </div>
                <div class="form-group mb-1 custom-form-group">
                    <input type="file" name="image" class="form-control" id="" placeholder="image"
                        accept=".png, .jpg">
                </div>
                <div class="form-group mb-1 custom-form-group">
                    <textarea name="about" class="form-control" id="" cols="30" rows="4" placeholder="about">{{ old('about') }}</textarea>
                </div>
                <div class="form-group mb-1 custom-form-group">
                    <input type="password" name="password" class="form-control" placeholder="password">
                </div>
                <div class="form-group mb-1 custom-form-group">
                    <input type="password" name="password_confirmation" class="form-control"
                        placeholder="password_confirmation">
                </div>
                <div class="form-group mb-1 custom-form-group">
                    <input type="submit" value="Register" class="form-control btn btn-register">
                </div>
                <div class="form-group mb-1 custom-form-group">
                    <a href="{{ url('redirect/facebook') }}" class="form-control btn btn-primary fb-login-btn">
                        <i class="fa-brands fa-facebook-square fa-xl"></i>
                        <span>Register with FB</span>
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection
