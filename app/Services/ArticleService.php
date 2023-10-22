<?php

namespace App\Services;

use App\Models\Article;

class ArticleService extends BaseService
{
    public function __construct()
    {
    }

    public function filter(array $queries)
    {
        $queryBuilder = Article::query();

        $queryBuilder->orderBy('created_at', 'desc');

        return $queryBuilder->paginate(
            data_get($queries, 'pagination_limit', config('app.pagination.limit')),
            ['*'],
            'pagination_page',
            data_get($queries, 'pagination_page', 1),
        );
    }
}
