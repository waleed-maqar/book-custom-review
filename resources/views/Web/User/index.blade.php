@extends('layouts.template')
@section('page-header')
    Users index
@endsection
@section('page-content')
    @forelse ($users as $user)
        <div class="h3">
            <a href="{{ route('user.show', $user->id) }}">
                {{ $user->user_name }}
                <strong>(has {{ $user->books_count }} books )</strong>
            </a>
        </div>
        <div class="">
            <img src="/{{ $user->profile }}" alt="" srcset="" style="height: 60px">
        </div>
        @if ($user->about)
            <p style="width: 100px">
                {{ excerpt($user->about, 40) }}
            </p>
        @endif
        <div class="user-index-user-books" style="background-color: #00a7">
            @forelse ($user->books->take(3) as $book)
                <h6>
                    {{ $book->title }}
                </h6>
            @empty
            @endforelse
        </div>
    @empty
    @endforelse
@endsection
