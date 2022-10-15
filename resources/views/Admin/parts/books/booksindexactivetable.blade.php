<table class="dashboard-control-table">
    <div class="mb-3 dasboard-control-table-pagination">
        {{ $books->render('pagination.ajax.ajaxPaginator') }}
    </div>
    <tr>
        <th>Book</th>
        <th>Reports Count</th>
        <th>Action</th>
    </tr>
    @forelse ($books as $book)
        <tr>
            <td> <a href="{{ route('dashboard.book.show', $book->id) }}">{{ excerpt($book->title, 12, true) }} </a>
            </td>
            <td>{{ count($book->reports) }}</td>
            <td>
                <form action="{{ route('dashboard.book.destroy', $book->id) }}" method="POST">
                    @csrf @method('DELETE')
                    <div class="d-inline-block mr-1 form-group">
                        <input type="submit" name="delete" value="Delete" class="btn btn-danger btn-alert form-control"
                            data-message="Delete Book?">
                    </div>
                    <div class="d-inline-block mr-1 form-group">
                        <input type="submit" name="suspend" value="Suspend"
                            class="btn btn-secondary btn-alert form-control" data-message="Suspend Book?">
                    </div>
                </form>
            </td>
        </tr>
    @empty
    @endforelse
</table>
