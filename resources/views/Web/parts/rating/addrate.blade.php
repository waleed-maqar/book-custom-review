<div class="scale-add-rate">
    <span class="total-rate-stars">
        <span class="scale-rate-reset" data-rate="0" data-scale={{ $scale->id }}>
            NO STARS
        </span>
        @for ($i = 1; $i <= 5; $i++)
            <span class="scale-rate-single-star" data-rate="{{ $i }}" data-scale={{ $scale->id }}>
                ★
            </span>
        @endfor
    </span>
</div>
