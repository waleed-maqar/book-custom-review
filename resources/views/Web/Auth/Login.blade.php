@extends('layouts.template')
@section('page-title', 'Login')
@section('page-header', 'User Login')
@section('style-file')
    <link rel="stylesheet" href="/assets/css/{{ app()->getlocale() }}/web/auth.css">
@endsection
@section('page-content')
    <div class="container">
        <div class="login-register-form">
            <form action="{{ route('User.login') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group mb-1 custom-form-group">
                    <input type="email" name="email" placeholder="email" value="{{ old('email') }}" class="form-control">
                </div>
                <div class="form-group mb-1 custom-form-group">
                    <input type="password" name="password" placeholder="password" class="form-control">
                </div>
                <div class="form-group mb-1 custom-form-group remember-me">
                    <input type="checkbox" name="remember" class="ml-3" id="remember">
                    <label for="remember">Remember me</label>
                </div>
                <div class="form-group mb-1 custom-form-group">
                    <input type="submit" value="Login" class="form-control btn btn-success">
                </div>
                <div class="form-group mb-1 custom-form-group">
                    <a href="{{ url('redirect/facebook') }}" class="form-control btn btn-primary fb-login-btn">
                        <i class="fa-brands fa-facebook-square fa-xl"></i>
                        <span>Login with FB</span>
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection
