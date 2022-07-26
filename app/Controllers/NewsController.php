<?php

namespace App\Controllers;

use App\Services\TodayCryptoNewsService;
use App\View;

class NewsController
{
    public function getIndex(): string
    {
        $service = new TodayCryptoNewsService();
        return new View(
            "app/Views/home.twig",
            ["articles" => $service->execute()->getAll()]
        );

    }
}