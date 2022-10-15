<span class="total-rate-stars">
    <span class="rate-star-orange">
        @for ($i = 1; $i <= intval($totalrate); $i++)
            ★
        @endfor
    </span>
    @if ($totalrate < 5)
        <span class='half'>
            <div style="width:{{ 24 * ($totalrate - intval($totalrate)) }}px;">★</div>
            <div
                style="margin-{{ app()->getLocale() == 'ar' ? 'right' : 'left' }}:{{ -(24 * ($totalrate - intval($totalrate))) }}px;">
                ★</div>
        </span>
        @for ($i = intval($totalrate) + 1; $i < 5; $i++)
            <span>
                ★
            </span>
        @endfor
    @endif
</span>
