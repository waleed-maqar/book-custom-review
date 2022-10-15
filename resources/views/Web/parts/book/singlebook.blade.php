<div class="p-3 book-card">
    <a href="{{ route('book.show', $book->id) }}" class="book-card-link">
        <div class="d-inline-block p-2 book-card-image">
            <img src="/{{ $book->photo }}" alt="" srcset="">
        </div>
        <h3 class="book-card-title">
            {{ $book->title }}
        </h3>
    </a>
    <h6 class="book-card-author">
        <a href="{{ route('author.show', $book->author->id) }}"> <strong>By:
                <small>{{ $book->author->name }}</small></strong></a>
    </h6>
    <div class="book-card-cats">
        @forelse ($book->categories as $category)
            <a href="{{ route('subcat.show', $category->category()->id) }}">
                {{ $category->category()->name }}
            </a>
            <span>|</span>
        @empty
        @endforelse
    </div>
    <p class="book-card-about">
        @if ($pagename == 'index')
            {{ excerpt($book->about, 150) }}
        @elseif($pagename == 'homepage')
            {{ excerpt($book->about, 200) }}
        @else
            {{ excerpt($book->about, 120, true) }}
        @endif
    </p>
</div>
