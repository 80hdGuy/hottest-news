<?php

namespace App;

use Twig;

class View
{
    private string $viewPath;
    private array $viewData;

    public function __construct(string $viewPath, array $viewData)
    {
        $this->viewPath = $viewPath;
        $this->viewData = $viewData;
    }

    public function __toString()
    {
        $loader = new Twig\Loader\FilesystemLoader(
            pathinfo($this->viewPath, PATHINFO_DIRNAME)
        );
        $twigEnvironment = new Twig\Environment($loader);
        return $twigEnvironment->render(
            pathinfo($this->viewPath, PATHINFO_BASENAME),
            $this->viewData
        );
    }


}