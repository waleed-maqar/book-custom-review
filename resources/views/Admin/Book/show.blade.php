@extends('layouts.template')
@section('page-header')
    {{ $book->title }}
@endsection
@section('page-content')
    <h1>
        {{ $book->title }}
    </h1>
    <form action="{{ route('dashboard.book.destroy', $book->id) }}" method="POST">
        @csrf @method('DELETE')
        <input type="submit" name="delete" value="Delete">
        @if ($book->trashed())
            <input type="submit" name="restore" value="Restore">
        @else
            <input type="submit" name="suspend" value="Suspend">
        @endif
    </form>
    Author: <a href="{{ route('author.show', $book->author->id) }}">{{ $book->author->name }}</a> <br>
    Added By: <a href="{{ route('dashboard.user.show', $book->user->id) }}">{{ $book->user->user_name }}</a>
    <div class="">
        <img src="/{{ $book->photo }}" alt="" srcset="" style="height: 200px">
    </div>
    <p>
        {{ $book->about }}
    </p>
    @forelse ($book->reports as $report)
        <div>
            <h3>{{ $report->report->reason }}</h3>
        </div>
    @empty
        <div class="alert alert-success">No reports for this book</div>
    @endforelse
@endsection
