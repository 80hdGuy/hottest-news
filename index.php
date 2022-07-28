<?php

use App\Repositories\ArticlesRepository;
use App\Repositories\NewsArticlesRepository;
use DI\Container;
use Dotenv\Dotenv;

require 'vendor/autoload.php';


$dotenv = Dotenv::createImmutable("./");
$dotenv->load();

$dispatcher = FastRoute\simpleDispatcher(function(FastRoute\RouteCollector $r) {
    $r->addRoute('GET', '/', "App\Controllers\NewsController@getIndex" );
});

// Fetch method and URI from somewhere
$httpMethod = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

// Strip query string (?foo=bar) and decode URI
if (false !== $pos = strpos($uri, '?')) {
    $uri = substr($uri, 0, $pos);
}
$uri = rawurldecode($uri);

$routeInfo = $dispatcher->dispatch($httpMethod, $uri);





switch ($routeInfo[0]) {
    case FastRoute\Dispatcher::NOT_FOUND:
        echo "404 Not Found";
        break;
    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
        $allowedMethods = $routeInfo[1];
        echo "405 Method Not Allowed";
        break;
    case FastRoute\Dispatcher::FOUND:

        $handler = $routeInfo[1];
        $vars = $routeInfo[2];
        [$controller,$method] = explode("@",$handler);

        $container = new Container();
        $container->set(ArticlesRepository::class,DI\create(NewsArticlesRepository::class));

        $response = ($container->get($controller))->$method();

        echo $response;

        break;
}

