<table class="dashboard-control-table">
    <div class="">
        {{ $trashedReviews->render('pagination.ajax.ajaxPaginator') }}
    </div>
    <tr>
        <th>review</th>
        <th>Book</th>
        <th>Reports Count</th>
        <th>Action</th>
    </tr>
    @forelse ($trashedReviews as $review)
        <tr>
            <td> <a href="{{ route('dashboard.review.show', $review->id) }}">{{ excerpt($review->title, 33) }} </a>
            </td>
            <td>{{ $review->book->title }}</td>
            <td>{{ count($review->reports) }}</td>
            <td>
                <form action="{{ route('dashboard.review.destroy', $review->id) }}" method="POST">
                    @csrf @method('DELETE')
                    <div class="d-inline-block mr-1 form-group">
                        <input type="submit" name="delete" value="Delete" class="btn btn-danger form-control btn-alert"
                            data-message="Delete Review?">
                    </div>
                    <div class="d-inline-block mr-1 form-group">
                        <input type="submit" name="restore" value="Restore"
                            class="btn btn-success form-control btn-alert" data-message="Restore Review?">
                    </div>
                </form>
            </td>
        </tr>
    @empty
    @endforelse
</table>
