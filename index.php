<?php

require 'vendor/autoload.php';

use App\Core\Request;
use App\Core\Router;
use App\Exception\RouterException;

//initialise la request
$request = new Request();
//initialisation de notre router
$router = new Router($request);

//on ajoute les routes dispo dans l'appli
$router->add("lol",function(){echo 'Bro wtf';},$request->getMethod());


//on lance notre application
try {
    $router->run($request);
} catch (RouterException $e) {
    echo $e->getMessage();
}


