<table class="dashboard-control-table">
    {{ $reviewReports->render('pagination.ajax.ajaxPaginator') }}
    <tr>
        <th>Review</th>
        <th>Reporter</th>
        <th>Reason</th>
        <th>Action</th>
    </tr>
    @forelse ($reviewReports as $reviewReport)
        <tr class="reports-table-action-{{ $reviewReport->action_class }}">
            <td><a
                    href="{{ $reviewReport->review ? route('dashboard.review.show', $reviewReport->review->id) : '' }}">{{ $reviewReport->review ? excerpt($reviewReport->review->title, 12, true) : 'Deleted Review' }}</a>
            </td>
            <td style="color:{{ $reviewReport->user ? 'blue' : 'red' }};">
                {{ $reviewReport->user ? $reviewReport->user->user_name : 'Deleted user' }}</td>
            <td>{{ $reviewReport->report->reason }}</td>
            <td>
                @if ($reviewReport->action)
                    {{ $reviewReport->action }}
                @else
                    <form action="{{ route('dashboard.report.update', $reviewReport->id) }}" method="POST">
                        @csrf @method('PUT')
                        <input type="hidden" name="report_type" value="review">
                        <input type="submit" value="Ignore report" class="btn btn-success form-control btn-alert"
                            data-message="ignore report?">
                    </form>
                @endif
            </td>
        </tr>
    @empty
    @endforelse
</table>
