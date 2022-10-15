<h4 class="book-card-scales-title">
    Book Scales
</h4>
@forelse ($book->scales as $scale)
    <div class="book-card-scale-rating">
        <b class="book-card-scale-scale">{{ $scale->scale }}</b>
        <span class="book-card-scale-rating-stars">
            @include('Web.parts.rating.totalrating', ['totalrate' => $scale->totalrate])
        </span>
    </div>
    <p>
        {{ $scale->explain }}
    </p>

@empty
@endforelse
