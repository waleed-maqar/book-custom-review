@for ($i = 1; $i <= 2; $i++)
    <a href="{{ $paginator->url($i) }}" @class([
        'ajax-pagination-page-link',
        'ajax-pagination-current-page' => $paginator->currentpage() == $i,
    ]) data-page="{{ $i }}">{{ $i }}
    </a>
@endfor
<div class="ajax-pagination-inbetween">
    <i class="fa-solid fa-ellipsis"></i>
</div>
@for ($i = $paginator->currentPage() - 2; $i <= $paginator->currentPage() + 2; $i++)
    <a href="{{ $paginator->url($i) }}" @class([
        'ajax-pagination-page-link',
        'ajax-pagination-current-page' => $paginator->currentpage() == $i,
    ])
        data-page="{{ $i }}">{{ $i }}</a>
@endfor
<div class="ajax-pagination-inbetween">
    <i class="fa-solid fa-ellipsis"></i>
</div>
@for ($i = $paginator->lastPage() - 1; $i <= $paginator->lastPage(); $i++)
    <a href="{{ $paginator->url($i) }}" @class([
        'ajax-pagination-page-link',
        'ajax-pagination-current-page' => $paginator->currentpage() == $i,
    ])
        data-page="{{ $i }}">{{ $i }}</a>
@endfor
