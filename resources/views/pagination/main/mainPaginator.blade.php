@if ($paginator->lastPage() > 1)
    <div class="text-center main-pagination-container">
        @if ($paginator->currentPage() <= $paginator->lastPage())
            <div class="main-pagination-prev">
                @if (!$paginator->onFirstPage())
                    <a href="{{ $paginator->previousPageUrl() }}">
                        <i class="fa-solid fa-angles-{{ app()->getLocale() == 'ar' ? 'right' : 'left' }} fa-2xl"></i>
                    </a>
                @else
                    <a class="main-pagination-no-prev">
                        <i class="fa-solid fa-angles-{{ app()->getLocale() == 'ar' ? 'right' : 'left' }}   fa-2xl"></i>
                    </a>
                @endif
            </div>
            <div class="main-pagination-pages-numbers">
                @if ($paginator->currentPage() <= 5)
                    @include('pagination.main.Paginatefirst')
                @elseif ($paginator->currentPage() >= $paginator->lastPage() - 5)
                    @include('pagination.main.Paginatelast')
                @else
                    @include('pagination.main.Paginatemiddle')
                @endif
            </div>
            <div class="main-pagination-next">
                @if ($paginator->hasMorePages())
                    <a href="{{ $paginator->nextPageUrl() }}">
                        <i class="fa-solid fa-angles-{{ app()->getLocale() == 'ar' ? 'left' : 'right' }}   fa-2xl"></i>
                    </a>
                @else
                    <a class="main-pagination-no-next">
                        <i class="fa-solid fa-angles-{{ app()->getLocale() == 'ar' ? 'left' : 'right' }}   fa-2xl"></i>
                    </a>
                @endif
            </div>
        @else
            <div class="alert alert-no-page-records">
                No Records For This page
            </div>
        @endif
    </div>

@endif
