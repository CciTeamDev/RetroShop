<?php
define("ROOT",realpath(__DIR__.DIRECTORY_SEPARATOR.'..'));
define("HTTP", ($_SERVER["SERVER_NAME"] == "localhost")
   ? "http://localhost:8000/"
   : "http://your_site_name.com/"
);
define("TEMPLATES",realpath(ROOT.DIRECTORY_SEPARATOR ."src" . DIRECTORY_SEPARATOR . "templates"));
require 'vendor/autoload.php';

use App\Controller\UserController;
use App\Core\Request;
use App\Core\Router;
use App\Core\Session;
use App\Exception\RouterException;

dump(ROOT.DIRECTORY_SEPARATOR ."src" . DIRECTORY_SEPARATOR . "templates");

//initialise la request
$request = new Request();
//initialisation de notre router
$router = new Router($request);

//on ajoute les routes dispo dans l'appli
$router->add("lol",function(){echo 'Bro wtf';},$request->getMethod());
$router->add("signup",function(){ (new UserController())->userSignup();},$request->getMethod());

//on lance notre application
try {
    $router->run($request);
} catch (RouterException $e) {
    echo $e->getMessage();
}


