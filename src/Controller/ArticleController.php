<?php

namespace App\Controller;

use App\Core\Abstract\AbstractController;
use App\Repository\ArticleRepository;
use App\Entity\User;

class ArticleController extends AbstractController {

    public function index () {
        // Récupérer les objets et les stockent dans une variable sous forme de tableau 
        $repo = new ArticleRepository();
        $articles = $repo->getArticles();

        $this->render("articles/Suggestion.php", [
            'articles' => $articles
        ]);
    }

    public function show($params)
    {
        // 
        
        $repo = new ArticleRepository();
        
        $articles = $repo->getOneArticle($params[0]);
        // dd($articles);
        $this->render("articles/FicheProduit.php", [
            'articles' => $articles
        ]);
        
    }
     
}