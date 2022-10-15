@if ($paginator->lastPage() > 6)
    @for ($i = 1; $i <= 2; $i++)
        <a href="{{ $paginator->url($i) }}" @class([
            'ajax-pagination-page-link',
            'ajax-pagination-current-page' => $paginator->currentpage() == $i,
        ])
            data-page="{{ $i }}">{{ $i }}
        </a>
    @endfor
    <div class="ajax-pagination-inbetween">
        <i class="fa-solid fa-ellipsis"></i>
    </div>
    @if ($paginator->currentPage() == $paginator->lastPage() - 5)
        <a href="{{ $paginator->previousPageUrl() }}" @class([
            'ajax-pagination-page-link',
            'ajax-pagination-current-page' =>
                $paginator->currentpage() == $paginator->lastPage() - 6,
        ])
            data-page="{{ $paginator->lastPage() - 6 }}">{{ $paginator->lastPage() - 6 }} </a>
    @endif
    @for ($i = $paginator->lastPage() - 5; $i <= $paginator->lastPage(); $i++)
        <a href="{{ $paginator->url($i) }}" @class([
            'ajax-pagination-page-link',
            'ajax-pagination-current-page' => $paginator->currentpage() == $i,
        ])
            data-page="{{ $i }}">{{ $i }}</a>
    @endfor
@else
    @for ($i = 1; $i <= 6; $i++)
        <a href="{{ $paginator->url($i) }}" @class([
            'ajax-pagination-page-link',
            'ajax-pagination-current-page' => $paginator->currentpage() == $i,
        ])
            data-page="{{ $i }}">{{ $i }}
        </a>
    @endfor
@endif
