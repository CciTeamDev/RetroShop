<?php

namespace App\Controller;

use App\Core\Abstract\AbstractController;
use App\Repository\CommandeRepository;
use App\Repository\UserRepository;

class CommandeController extends AbstractController {
public function __construct()
{
    
}
    
    public function panierCheck(){
        if(!isset($_SESSION["panier"]) && isset($_SESSION["user"])) {//si panier non set
            $cmd = new CommandeRepository();
            $usr = new UserRepository();
            $user = $usr->getUserById(($_SESSION["user"])->getId_user());
            $comm = $cmd->createCommande($user);
            //créer une nouvelle commande;
            dd($comm);
            $_SESSION["panier"] = [];
        } else {
            //compter le nombre d'objets dans le panier - SUM QTE
            dump($_SESSION);
            echo 'meep';
            
        }
    }

    public function addToCart(){

    }

}