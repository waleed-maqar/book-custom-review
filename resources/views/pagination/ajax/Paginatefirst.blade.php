@if ($paginator->lastPage() > 6)
    @for ($i = 1; $i <= 5; $i++)
        <a href="{{ $paginator->url($i) }}" @class([
            'ajax-pagination-page-link',
            'ajax-pagination-current-page' => $paginator->currentpage() == $i,
        ])
            data-page="{{ $i }}">{{ $i }} </a>
    @endfor
    @if ($paginator->currentPage() == 5)
        <a href="{{ $paginator->url(6) }}" @class([
            'ajax-pagination-page-link',
            'ajax-pagination-current-page' => $paginator->currentpage() == 6,
        ]) data-page="6">6 </a>
    @endif
    <div class="ajax-pagination-inbetween">
        <i class="fa-solid fa-ellipsis"></i>
    </div>
    @if ($paginator->lastPage() > 6)
        @for ($i = $paginator->lastPage() - 1; $i <= $paginator->lastPage(); $i++)
            <a href="{{ $paginator->url($i) }}" @class([
                'ajax-pagination-page-link',
                'ajax-pagination-current-page' => $paginator->currentpage() == $i,
            ])
                data-page="{{ $i }}">{{ $i }}</a>
        @endfor
    @endif
@else
    @for ($i = 1; $i <= $paginator->lastPage(); $i++)
        <a href="{{ $paginator->url($i) }}" @class([
            'ajax-pagination-page-link',
            'ajax-pagination-current-page' => $paginator->currentpage() == $i,
        ])
            data-page="{{ $i }}">{{ $i }} </a>
    @endfor
@endif
