<form action="{{ route('review.store', $book->id) }}" method="POST">
    @csrf
    <h3 class="text-center review-card-title">
        Add review
    </h3>
    <div class="form-group">
        @forelse ($book->scales as $scale)
            {{ $scale->scale }}
            @include('Web.parts.rating.addrate')
            <input type="hidden" name="scales[{{ $scale->id }}]" id="reviewrateforscale-{{ $scale->id }}">
        @empty
        @endforelse
    </div>
    <div class="mt-1 row">
        <div class="form-group col-md-6 col-sm-9">
            <input type="text" name="review[title]" class="form-control" placeholder="title">
        </div>
    </div>
    <div class="mt-1 row">
        <div class="form-group col-12">
            <span>Type your review</span>
            <div class="new-review-text" contenteditable="">
            </div>
            <textarea name="review[review]" id="newreviewtextarea" style="display: none"></textarea>
        </div>
    </div>
    <div class="mt-1 row">
        <div class="form-group col-9">
            <input type="submit" value="Add Review" class="btn btn-addreview form-control">
        </div>
    </div>
</form>
