<h6 class="single-book-single-review-title">
    {{ $review->title ?? 'NO Title' }}
    <span class="d-block single-review-addedby">
        by: <a href="{{ route('user.show', $review->user->id) }}">{{ $review->user->user_name }}</a>
    </span>
    @owner($review->user_id)
    @else
        @auth
            <div class="element-show-btn review-card-send-report" data-element=".add-review-report"
                data-review="{{ $review->id }}">
                <i class="fas fa-flag"></i>
            </div>
        @endauth
    @endowner
</h6>
<div class="single-book-single-review-review">
    @if (mb_strlen($review->review) <= 300)
        <div id="review-{{ $review->id }}-review-full">
            {{ $review->review }}
        </div>
    @else
        <div id="review-{{ $review->id }}-review-excerpt">
            {{ excerpt($review->review, 250, true) }}
            <span class="text-seemore review-card-review-seemore" data-text="#review-{{ $review->id }}-review">
                See more
            </span>
        </div>
        <div id="review-{{ $review->id }}-review-full" style="display: none;">
            {{ $review->review }}
            <span class="text-seeless review-card-review-seeless" data-text="#review-{{ $review->id }}-review">
                See less
            </span>
        </div>
    @endif
</div>
<div class="text-center single-book-single-review-reaction">
    @owner($review->user_id)
    @else
        @auth
            @if (!$review->liked)
                <span class="single-review-add-reaction single-book-single-review-like" data-action="like"
                    data-review="{{ $review->id }}">
                    <i class="fa-solid fa-sort-up fa-2x"></i>
                </span>
            @endif
            <span class="single-book-single-review-rate">
                {{ $review->rating }}
            </span>
            @if (!$review->disliked)
                <span class="single-review-add-reaction single-book-single-review-unlike" data-action="dislike"
                    data-review="{{ $review->id }}">
                    <i class="fa-solid fa-sort-down fa-2x"></i>
                </span>
            @endif
        @endauth
    @endowner
</div>
@auth

@endauth
