<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Article\FilterArticleCollection;
use App\Services\ArticleService;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    protected ArticleService $articleService;

    public function __construct(ArticleService $articleService)
    {
        $this->articleService = $articleService;
    }

    public function filter(Request $request): FilterArticleCollection
    {
        $result = $this->articleService->filter($request->query());

        return new FilterArticleCollection($result);
    }
}
