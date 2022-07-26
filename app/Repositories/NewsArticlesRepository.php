<?php

namespace App\Repositories;

use App\Models\NewsArticle;
use Dotenv\Dotenv;
use jcobhams\NewsApi\NewsApi;
use App\Models\NewsArticlesCollection;

class NewsArticlesRepository implements ArticlesRepository
{

    public function getAll(string $q, string $from = null, string $to = null): NewsArticlesCollection
    {
        $dotenv = Dotenv::createImmutable("./");
        $dotenv->load();
        $apiKey = $_ENV['API_KEY'];
        $newsApi = new NewsApi($apiKey);


        $all_articles = $newsApi->getEverything(
            $q,
            null,
            null,
            null,
            $from,
            $to,
            "en",
            null,
            10,
            null);


        $articles = [];
        foreach ($all_articles->articles as $article) {
            //echo "<pre>";
            //var_dump($article);die;
            $articles[] = new NewsArticle(
                (string)$article->source->name,
                (string)$article->author,
                (string)$article->title,
                (string)$article->description,
                (string)$article->url,
                (string)$article->urlToImage,
                (string)$article->publishedAt
            );
        }
        return new NewsArticlesCollection($articles);

    }
}