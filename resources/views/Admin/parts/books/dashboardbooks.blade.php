{{ $books->render('pagination.ajax.ajaxPaginator') }}
<div class="dashboard-books-card" id="dashboardbookscard">
    @forelse ($books as $book)
        <a href="{{ route('dashboard.book.show', $book->id) }}" class="dashboard-single-book">
            {{ $book->title }}
        </a>
    @empty
    @endforelse
</div>
