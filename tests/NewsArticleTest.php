<?php

use App\Models\NewsArticle;

test("Should return the article properties", function () {
    $article = new NewsArticle(
        "Codelex",
        "Rihards",
        "PHP\$ever",
        "love php",
        "some url",
        "some image url",
        "2022-07-25");
    expect($article->getSourceName())->toBe("Codelex");
    expect($article->getAuthor())->toBe("Rihards");
    expect($article->getTitle())->toBe("PHP\$ever");
    expect($article->getDescription())->toBe("love php");
    expect($article->getUrl())->toBe("some url");
    expect($article->getUrlToImage())->toBe("some image url");
    expect($article->getPublishedAt())->toBe("2022-07-25");
});