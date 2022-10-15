@extends('layouts.template')
@section('page-title', excerpt($user->user_name, 8, true))
@section('style-file')
    <link rel="stylesheet" href="/assets/css/{{ app()->getlocale() }}/web/homepage.css">
    <link rel="stylesheet" href="/assets/css/{{ app()->getlocale() }}/pagination/mainpagination.css">
    <link rel="stylesheet" href="/assets/css/{{ app()->getlocale() }}/web/singleuser.css">
@endsection
@section('page-header')
    {{ $user->user_name }} Profile
@endsection
@section('page-content')
    @isset($user)
        <div class="user-card">
            @owner($user->id)
                <div class="user-card-edit">
                    <a href="{{ route('user.edit', $user->id) }}" class="btn btn-user-edit">
                        <i class="fas fa-edit"></i>
                    </a>
                </div>
            @endowner
            <div class="m-3 user-card-image-container">
                <img src="/{{ $user->profile }}" class="user-card-image">
            </div>
            @admin_with_role('moderator')
                <div class="show-as-admin-link">
                    <a href="{{ route('dashboard.user.show', $user->id) }}">Show As Admin</a>
                </div>
            @endadmin_with_role
            <p class="user-card-about">
                {{ $user->about }}
            </p>
        </div>
        <div class="my-5 single-user-books-container">
            @if (count($userBooks) > 0)
                <h1>{{ explode(' ', $user->user_name)[0] }} Books</h1>
                {{ $userBooks->render('pagination.main.mainPaginator') }}
            @endif
            @forelse ($userBooks as $book)
                <div class="mb-2 single-user-book-card">
                    @include('Web.parts.book.singlebook', ['pagename' => 'profile'])
                </div>
            @empty
                <div class="mt-5 No-books-yet">
                    No Books for this User
                </div>
            @endforelse
        </div>
    @endisset

@endsection
