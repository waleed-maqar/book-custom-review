@for ($i = 1; $i <= 2; $i++)
    <a href="{{ $paginator->url($i) }}" @class([
        '',
        'main-pagination-current-page' => $paginator->currentpage() == $i,
    ])>{{ $i }} </a>
@endfor
<div class="main-pagination-inbetween">
    <i class="fa-solid fa-ellipsis"></i>
</div>
@for ($i = $paginator->lastPage() - 5; $i <= $paginator->lastPage(); $i++)
    <a href="{{ $paginator->url($i) }}" @class([
        '',
        'main-pagination-current-page' => $paginator->currentpage() == $i,
    ])>{{ $i }}</a>
@endfor
