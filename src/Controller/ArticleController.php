<?php

namespace App\Controller;

use App\Core\Abstract\AbstractController;
use App\Repository\ArticleRepository;
use App\Entity\User;

class ArticleController extends AbstractController {

    public function index () {
        $title = "articles";
        // Récupérer les objets et les stockent dans une variable sous forme de tableau 
        $repo = new ArticleRepository();
        $articles = $repo->getArticles();

        $this->render("articles/Suggestion.php", [
            'articles' => $articles,
            'title'=> $title
        ]);
    }

    public function show($params)
    {
        $repo = new ArticleRepository();
        
        $articles = $repo->getOneArticle($params[0]);
        // dd($articles);
        $this->render("articles/FicheProduit.php", [
            'articles' => $articles
        ]);
        
    }
     
    public function search($productSearched)
    {
        $repo = new ArticleRepository();
        
        $articles = $repo->searchArticle($productSearched[0]);
        // dd($articles);
        $this->render("articles/recherche.php", [
            'articles' => $articles
        ]);
        
    }
}