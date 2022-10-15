@if ($paginator->lastPage() > 1)
    <div class="text-center ajax-pagination-container">
        @if ($paginator->currentPage() <= $paginator->lastPage())
            <div class="ajax-pagination-prev">
                @if (!$paginator->onFirstPage())
                    <a href="{{ $paginator->previousPageUrl() }}" class="ajax-pagination-page-link"
                        data-page="{{ $paginator->currentPage() - 1 }}">
                        <i class="fa-solid fa-angles-{{ app()->getLocale() == 'ar' ? 'right' : 'left' }}  fa-2xl"></i>
                    </a>
                @else
                    <a class="ajax-pagination-no-prev">
                        <i class="fa-solid fa-angles-{{ app()->getLocale() == 'ar' ? 'right' : 'left' }}   fa-2xl"></i>
                    </a>
                @endif
            </div>
            <div class="ajax-pagination-pages-numbers">
                @if ($paginator->currentPage() <= 5)
                    @include('pagination.ajax.Paginatefirst')
                @elseif ($paginator->currentPage() >= $paginator->lastPage() - 5)
                    @include('pagination.ajax.Paginatelast')
                @else
                    @include('pagination.ajax.Paginatemiddle')
                @endif
            </div>
            <div class="ajax-pagination-next">
                @if ($paginator->hasMorePages())
                    <a href="{{ $paginator->nextPageUrl() }}" class="ajax-pagination-page-link"
                        data-page="{{ $paginator->currentPage() + 1 }}">
                        <i class="fa-solid fa-angles-{{ app()->getLocale() == 'ar' ? 'left' : 'right' }}   fa-2xl"></i>
                    </a>
                @else
                    <a class="ajax-pagination-no-next">
                        <i class="fa-solid fa-angles-{{ app()->getLocale() == 'ar' ? 'left' : 'right' }}   fa-2xl"></i>
                    </a>
                @endif
            </div>
        @else
            <div class="alert alert-no-page-records">
                No Records For This page
            </div>
        @endif

        <span class="float-right mr-2"> Showing {{ $paginator->count() }} From {{ $paginator->total() }} </span>
    </div>

@endif
