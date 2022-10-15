{{ $reviews->render('pagination.ajax.ajaxPaginator') }}
<div class="dashboard-reviews-card" id="dashboardreviewscard">
    @forelse ($reviews as $review)
        <a href="{{ route('dashboard.review.show', $review->id) }}" class="dashboard-single-review">
            {{ $review->title }}
        </a>
    @empty
    @endforelse
</div>
