@if ($paginator->lastPage() > 5)
    @for ($i = 1; $i <= 5; $i++)
        <a href="{{ $paginator->url($i) }}" @class([
            '',
            'main-pagination-current-page' => $paginator->currentpage() == $i,
        ])>{{ $i }} </a>
    @endfor
    @if ($paginator->currentPage() == 5)
        <a href="{{ $paginator->url(6) }}" @class([
            '',
            'main-pagination-current-page' => $paginator->currentpage() == 6,
        ])>6 </a>
    @endif
    <div class="main-pagination-inbetween">
        <i class="fa-solid fa-ellipsis"></i>
    </div>
    @for ($i = $paginator->lastPage() - 1; $i <= $paginator->lastPage(); $i++)
        <a href="{{ $paginator->url($i) }}" @class([
            '',
            'main-pagination-current-page' => $paginator->currentpage() == $i,
        ])>{{ $i }}</a>
    @endfor
@else
    @for ($i = 1; $i <= $paginator->lastPage(); $i++)
        <a href="{{ $paginator->url($i) }}" @class([
            '',
            'main-pagination-current-page' => $paginator->currentpage() == $i,
        ])>{{ $i }} </a>
    @endfor
@endif
