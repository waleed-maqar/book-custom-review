    @owner($book->user_id)
        <div class="book-card-edit">
            <a href="{{ route('book.edit', $book->id) }}" class="btn-book-edit"><i class="fas fa-edit"></i></a>
        </div>
    @else
        @auth
            <div class="element-show-btn book-card-send-report" data-element=".add-book-report">
                <i class="fas fa-flag"></i>
            </div>
        @endauth
    @endowner
    <div class="card-book-image">
        <img src="/{{ $book->photo }}" alt="" srcset="" style="height: 200px">
    </div>
    <div class="book-card-rating">
        @include('Web.parts.rating.totalrating', ['totalrate' => $book->totalrate])

        <strong>{{ round($book->totalrate, 2) }}</strong>
    </div>
    <div class="book-card-author">
        <b>Author:</b>
        <a href="{{ route('author.show', $book->author->id) }}">
            {{ $book->author->name }}
        </a>
    </div>
    <div class="book-card-user">
        <b>Added By:</b>
        <a href="{{ route('user.show', $book->user->id) }}">
            {{ $book->user->user_name }}
        </a>
    </div>
    <div class="book-card-cats">
        @forelse ($book->categories as $category)
            <a href="{{ route('subcat.show', $category->category()->id) }}">{{ $category->category()->name }}</a>
            <span>|</span>
        @empty
        @endforelse
    </div>
    <div class="book-card-scales">
        @include('Web.parts.scale.bookscales')
    </div>
    <div class="book-card-about">
        @if (mb_strlen($book->about) <= 220)
            <div class="book-card-about-full">
                {{ $book->about }}
            </div>
        @else
            <div class="book-card-about-excerpt">
                {{ excerpt($book->about, 200, true) }}
                <span class="text-seemore book-card-about-seemore" data-text=".book-card-about">see more</span>
            </div>
            <div class="book-card-about-full" style="display: none">
                {{ $book->about }}
                <span class="text-seeless book-card-about-seeless" data-text=".book-card-about">see less</span>
            </div>
        @endif
    </div>
