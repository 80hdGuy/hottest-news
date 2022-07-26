<?php

namespace App\Services;

use App\Models\NewsArticlesCollection;
use App\Repositories\NewsArticlesRepository;
use Carbon\Carbon;

class TodayCryptoNewsService
{

    private NewsArticlesRepository $newsArticlesRepository;

    public function __construct()
    {
        $this->newsArticlesRepository = new NewsArticlesRepository();
    }

    public function execute(): NewsArticlesCollection
    {
        return $this->newsArticlesRepository->getAll("crypto", Carbon::now("Europe/Riga")->format("Y-m-d"));
    }
}