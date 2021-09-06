<?php

namespace App\Controller;

use App\Core\Abstract\AbstractController;
use App\Repository\ArticleRepository;
use App\Entity\User;

class ArticleController extends AbstractController {

    public function index () {
        // Récupérer les objets et les stockent dans une variable sous forme de tableau 
        $repo = new ArticleRepository();
        dd($repo->getArticles());
        // passer la variable sous forme de clef valeur dans le tableau des variable de la méthod render

        // $this->render('object/index.html',[
        //     'object' => $objectDB
        // ]);
    }
}