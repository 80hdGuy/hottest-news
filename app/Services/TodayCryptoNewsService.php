<?php

namespace App\Services;

use App\Models\NewsArticlesCollection;
use App\Repositories\ArticlesRepository;
use App\Repositories\NewsArticlesRepository;
use Carbon\Carbon;

class TodayCryptoNewsService
{

    private ArticlesRepository $newsArticlesRepository;

    public function __construct(ArticlesRepository $articlesRepository)
    {
        $this->newsArticlesRepository = $articlesRepository;
    }

    public function execute(): NewsArticlesCollection
    {
        return $this->newsArticlesRepository->getAll("crypto", Carbon::now("Europe/Riga")->format("Y-m-d"));
    }
}