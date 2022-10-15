<span class="btn element-hide-btn add-book-report-form-close" data-element=".add-report">
    x
</span>
<form action="{{ route('book.report', $book->id) }}">
    @forelse (\App\Models\Report::get() as $report)
        <div class="form-group book-report-form-group">
            <label for="reason-{{ $report->id }}">
                <span class="book-report-reason">
                    {{ $report->reason }}
                </span>
                <small class="book-report-explain">{{ $report->explain }}</small>
            </label>
            <input type="radio" name="report_id" value="{{ $report->id }}" id="reason-{{ $report->id }}"
                class="">
        </div>
    @empty
    @endforelse
    <input type="submit" value="Send Report" class="btn btn-danger mt-3 form-control">
</form>
