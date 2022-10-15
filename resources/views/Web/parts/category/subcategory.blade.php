<h4 class="text-center sub-cat-card-title">
    {{ $subcategory->name }}
</h4>
<div class="sub-cat-books-card">
    @forelse ($subcategory->cats->take(3) as $cat)
        <div class="sub-cat-card-single-book">
            <a href="{{ route('book.show', $cat->book->id) }}">{{ $cat->book->title }}</a>
        </div>
    @empty
    @endforelse
</div>
<a href="{{ route('subcat.show', $subcategory->id) }}" class="sub-cat-card-link">See More
    Books
    from
    {{ $subcategory->name }}</a>
