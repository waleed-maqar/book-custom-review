<table class="dashboard-control-table">
    <div class="">
        {{ $userReports->render('pagination.ajax.ajaxPaginator') }}
    </div>
    <tr>
        <th>type</th>
        <th>item</th>
        <th>reason</th>
    </tr>
    @forelse ($userReports as $report)
        @if ($report->book)
            <tr>
                <td>Book</td>
                <td><a href="{{ route('dashboard.book.show', $report->book->id) }}">{{ $report->book->title }}</a>
                </td>
                <td>{{ $report->report->reason }}</td>
            </tr>
        @else
            <tr>
                <td>Review</td>
                <td><a
                        href="{{ route('dashboard.review.show', $report->review->id) }}">{{ $report->review->title }}</a>
                </td>
                <td>{{ $report->report->reason }}</td>
            </tr>
        @endif
    @empty
        No reports About this user
    @endforelse
</table>
