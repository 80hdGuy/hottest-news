<?php

namespace App\Controllers;

use App\Services\TodayCryptoNewsService;
use App\View;

class NewsController
{
    private TodayCryptoNewsService $service;
    public function __construct(TodayCryptoNewsService $service)
    {
        $this->service = $service;
    }

    public function getIndex(): View
    {
        return new View(
            "app/Views/home.twig",
            ["articles" => $this->service->execute()->getAll()]
        );
    }
}