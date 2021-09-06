<?php

namespace App\Controller;

use App\Core\Abstract\AbstractController;
use App\Entity\User;

class ArticleController extends AbstractController {

    public function index () {
        
        

        $this->render('articles/index.html',[]);
    }
}