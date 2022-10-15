<table class="dashboard-control-table">
    {{ $bookReports->render('pagination.ajax.ajaxPaginator') }}
    <tr>
        <th>Book</th>
        <th>Reporter</th>
        <th>Reason</th>
        <th>Action</th>
    </tr>
    @forelse ($bookReports as $bookReport)
        <tr class="reports-table-action-{{ $bookReport->action_class }}">
            <td><a
                    href="{{ route('dashboard.book.show', $bookReport->book->id) }}">{{ excerpt($bookReport->book->title, 12, true) }}</a>
            </td>
            <td style="color:{{ $bookReport->user ? 'blue' : 'red' }};">
                {{ $bookReport->user ? $bookReport->user->user_name : 'Deleted User' }}</td>
            <td>{{ $bookReport->report->reason }}</td>
            <td>
                @if ($bookReport->action)
                    {{ $bookReport->action }}
                @else
                    <form action="{{ route('dashboard.report.update', $bookReport->id) }}" method="POST">
                        @csrf @method('PUT')
                        <input type="hidden" name="report_type" value="book">
                        <input type="submit" value="Ignore report" class="btn btn-success form-control btn-alert"
                            data-message="ignore report?">
                    </form>
                @endif
            </td>
        </tr>
    @empty
    @endforelse
</table>
