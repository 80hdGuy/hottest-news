<?php

namespace App\Repositories;

use App\Models\NewsArticlesCollection;

interface ArticlesRepository
{
    public function getAll(string $q): NewsArticlesCollection;
}