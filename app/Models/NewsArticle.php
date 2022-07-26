<?php

namespace App\Models;


class NewsArticle
{
    private string $sourceName;
    private string $author;
    private string $title;
    private string $description;
    private string $url;
    private string $urlToImage;
    private string $publishedAt;

    public function __construct(string $sourceName,
                                string $author,
                                string $title,
                                string $description,
                                string $url,
                                string $urlToImage,
                                string $publishedAt)
    {

        $this->sourceName = $sourceName;
        $this->author = $author;
        $this->title = $title;
        $this->description = $description;
        $this->url = $url;
        $this->urlToImage = $urlToImage;
        $this->publishedAt = $publishedAt;
    }

    /**
     * @return string
     */
    public function getSourceName(): string
    {
        return $this->sourceName;
    }

    /**
     * @return string
     */
    public function getAuthor(): string
    {
        return $this->author;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @return string
     */
    public function getUrlToImage(): string
    {
        return $this->urlToImage;
    }

    /**
     * @return string
     */
    public function getPublishedAt(): string
    {
        return $this->publishedAt;
    }

}