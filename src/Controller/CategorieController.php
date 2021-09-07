<?php

namespace App\Controller;

use App\Core\Abstract\AbstractController;
use App\Repository\CategorieRepository;
use App\Entity\User;

class CategorieController extends AbstractController {
    public function index ($categorie) {
        
        // Récupérer les objets et les stockent dans une variable sous forme de tableau 
        $repo = new CategorieRepository();
        $articles = $repo->getArticlesByCategorie($categorie[0]);

        $this->render("articles/ShowByCategorie.php", [
            'articles' => $articles
        ]);


    }
  
}