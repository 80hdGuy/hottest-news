<?php

namespace App\Models;

class NewsArticlesCollection
{
    /**
     * @var  NewsArticle[]
     */
    private array $articles;

    public function __construct(array $articles)
    {
        foreach ($articles as $article) {
            $this->add($article);
        }
        $this->articles = $articles;
    }

    private function add(NewsArticle $article): void
    {
        $this->articles[] = $article;
    }

    /**
     * @return NewsArticle[]
     */
    public function getAll(): array
    {
        return $this->articles;
    }
}