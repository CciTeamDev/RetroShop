<?php

require 'vendor/autoload.php';

use App\Controller\ArticleController;
use App\Controller\CategorieController;
use App\Core\Request;
use App\Core\Router;
use App\Exception\RouterException;

//initialise la request
$request = new Request();
//initialisation de notre router
$router = new Router($request);
$artController = new ArticleController();
//$categController = new CategorieController();
//on ajoute les routes dispo dans l'appli


$router->add("ficheproduit/:id", [$artController, "show"], $request->getMethod());

$router->add("articles/:id/:page",[$artController, 'index'],$request->getMethod());

$router->add("search/:word",[$artController, 'search'],$request->getMethod());

//on lance notre application
try {
    $router->run($request);
} catch (RouterException $e) {
    echo $e->getMessage();
}


