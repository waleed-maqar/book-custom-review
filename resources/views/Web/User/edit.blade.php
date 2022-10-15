@extends('layouts.template')
@section('page-title', 'Profile Edit')
@section('page-header')
    {{ $user->user_name }} Info Edit
@endsection
@section('style-file')
    <link rel="stylesheet" href="/assets/css/{{ app()->getlocale() }}/web/auth.css">
@endsection
@section('page-content')
    <div class="container">
        <div class="login-register-form">
            <form action="{{ route('user.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                <div class="row">
                    @csrf @method('PUT')
                    <div class="form-group mb-1 custom-form-group">
                        <input type="text" name="user_name" class="form-control" placeholder="name"
                            value="{{ $user->user_name }}">
                    </div>
                    <div class="form-group mb-1 custom-form-group">
                        <input type="file" name="image" class="form-control" id="" placeholder="image"
                            accept=".png, .jpg">
                    </div>
                    <div class="form-group mb-1 custom-form-group">
                        <textarea name="about" class="form-control" id="" cols="30" rows="10" placeholder="about">{{ $user->about }}</textarea>
                    </div>
                    @if ($user->register_via === 'web')
                        <div class="form-group mb-1 custom-form-group">
                            <input type="email" name="email" class="form-control" id="" placeholder="email"
                                value="{{ $user->email }}">
                        </div>
                        <div class="form-group mb-1 custom-form-group">
                            <input type="password" name="password" class="form-control" placeholder="password">
                        </div>
                        <div class="form-group mb-1 custom-form-group">
                            <input type="password" name="password_confirmation" class="form-control"
                                placeholder="password_confirmation">
                        </div>
                    @endif
                    <div class="form-group mb-1 custom-form-group">
                        <input type="submit" value="Update" class="btn btn-primary form-control">
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
