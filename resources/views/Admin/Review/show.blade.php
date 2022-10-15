@extends('layouts.template')
@section('page-header')
    {{ $review->title }}
@endsection
@section('page-content')
    <h2>
        {{ $review->title }}
    </h2>
    <form action="{{ route('dashboard.review.destroy', $review->id) }}" method="POST">
        @csrf @method('DELETE')
        <input type="submit" name="delete" value="Delete">
        @if ($review->trashed())
            <input type="submit" name="restore" value="Restore">
        @else
            <input type="submit" name="suspend" value="Suspend">
        @endif
    </form>
    <p>
        {{ $review->review }}
    </p>
    <span>
        Book: <a href="{{ route('dashboard.book.show', $review->book->id) }}">{{ $review->book->title }}</a>
    </span>
    <hr>
    @forelse ($review->reports as $report)
        <div>
            <h3>{{ $report->report->reason }}</h3>
        </div>
    @empty
        <div class="alert alert-success">No reports for this Review</div>
    @endforelse
@endsection
