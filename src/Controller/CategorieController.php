<?php

namespace App\Controller;
use App\Repository\PaginationRepository;
use App\Core\Abstract\AbstractController;
use App\Repository\CategorieRepository;
use App\Entity\Produit;

class CategorieController extends AbstractController {
    public function index ($params) {
        
        // Récupérer les objets et les stockent dans une variable sous forme de tableau 
        $repo = new CategorieRepository();
        $articles = $repo->getArticlesByCategorie($params[0]);
        $this->render("articles/ShowByCategorie.php", [
            'articles' => $articles

        ]);
    }
  
}