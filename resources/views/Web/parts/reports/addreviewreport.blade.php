<span class="btn element-hide-btn add-book-report-form-close" data-element=".add-review-report">
    x
</span>
<h6 class="text-center">Report review from: {{ $review->user->user_name }}</h6>
<form action="{{ route('review.report', $review->id) }}">
    @forelse (\App\Models\Report::get() as $report)
        <div class="form-group book-report-form-group">
            <label for="review-reason-{{ $report->id }}">
                <span class="book-report-reason">
                    {{ $report->reason }}
                </span>
                <small class="book-report-explain">{{ $report->explain }}</small>
            </label>
            <input type="radio" name="report_id" value="{{ $report->id }}" id="review-reason-{{ $report->id }}"
                class="">
        </div>
    @empty
    @endforelse
    <input type="submit" value="Send Report" class="btn btn-danger mt-3 form-control">
</form>
