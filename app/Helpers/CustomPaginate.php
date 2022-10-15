<?php

use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

/**
 * Paginate a standard Laravel Collection.
 *
 * @param int $perPage
 * @param int $total
 * @param int $page
 * @param string $pageName
 * @return array
 */
Collection::macro('paginate', function ($perPage, $total = null, $page = null, $pageName = 'page') {
    $page = $page ?: LengthAwarePaginator::resolveCurrentPage($pageName);

    return new LengthAwarePaginator(
        $this->forPage($page, $perPage),
        $total ?: $this->count(),
        $perPage,
        $page,
        [
            'path' => LengthAwarePaginator::resolveCurrentPath(),
            'pageName' => $pageName,
        ]
    );
});