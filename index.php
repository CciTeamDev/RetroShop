<?php

define(
    "HTTP",
    ($_SERVER["SERVER_NAME"] == "localhost")
        ? "http://localhost:8000/"
        : "http://your_site_name.com/"
);

require 'vendor/autoload.php';

use App\Controller\ArticleController;
use App\Controller\CategorieController;
use App\Controller\CommandeController;
use App\Controller\UserController;
use App\Core\Request;
use App\Core\Router;
use App\Core\Session;
use App\Exception\RouterException;
use App\Repository\UserRepository;

session_start();
$session = new Session(
    isset($_SESSION["user"]) ? $_SESSION["user"] : null
);

?>

<a href="<?= HTTP ?>"><button>Accueil</button></a>
<?php if (!isset($_SESSION["user"])) : ?>

    <a href="<?= HTTP ?>articles"><button>Articles</button></a>
    <a href="<?= HTTP ?>signup"><button>S'enregistrer</button></a>
    <a href="<?= HTTP ?>signin"><button>Se connecter</button></a>
<?php else : ?>
    <a href="<?= HTTP ?>articles"><button>Articles</button></a>
    <a href="<?= HTTP ?>user<?= DIRECTORY_SEPARATOR ?>show"><button>Afficher mon profil</button></a>
    <a href="<?= HTTP ?>signout"><button>Se déconnecter</button></a>
<?php endif; ?>


<?php


//initialise la request
$request = new Request();
if ($request->getFilenameExtension() === "png" || $request->getFilenameExtension() === "jpg") {
    header("Content-type: image/png");
    readfile($request->getScriptFileName());
} else if ($request->getFilenameExtension() === "css") {
    header("Content-type: text/css");
    readfile($request->getScriptFileName());
} else {
    //initialisation de notre router
    $router = new Router($request);
    $artController = new ArticleController();
    //$categController = new CategorieController();
    //on ajoute les routes dispo dans l'appli


    $router->add("", [$artController, 'index'], $request->getMethod());
    $router->add("ficheproduit/:id", [$artController, "show"], $request->getMethod());
    $router->add("articles/:id/:page", [$artController, 'pagination'], $request->getMethod());
    $router->add("search", [$artController, 'search'], $request->getMethod());




    //on ajoute les routes dispo dans l'appli


    $router->add("signup", function () {
        (new UserRepository());
        (new UserController())->userSignup();
        (new CommandeController())->commandeCheck();
    }, $request->getMethod());

    $router->add("signin", function () {
        (new UserRepository());
        (new UserController())->userSignin();
        (new CommandeController())->commandeCheck();
    }, $request->getMethod());

    $router->add("signout", function () {
        (new UserRepository());
        (new UserController())->userSignout();
        (new CommandeController())->commandeCheck();
    }, $request->getMethod());

    $router->add("user/show", function () {
        (new UserRepository());
        (new UserController())->userShow(($_SESSION["user"])->getId_user());
        (new CommandeController())->commandeCheck();
    }, $request->getMethod());

    $router->add("user/update", function () {
        (new UserRepository());
        (new UserController())->userUpdate(($_SESSION["user"])->getId_user());
        (new CommandeController())->commandeCheck();
    }, $request->getMethod());

    $router->add("commande/validation", function () {
        (new UserRepository());
        (new CommandeController())->updateCommande();
    }, $request->getMethod());
}
//on lance notre application
try {
    $router->run($request);
} catch (RouterException $e) {
    echo $e->getMessage();
}
