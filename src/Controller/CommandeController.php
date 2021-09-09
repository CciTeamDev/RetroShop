<?php

namespace App\Controller;

use App\Core\Abstract\AbstractController;
use App\Repository\CommandeRepository;
use App\Repository\PanierRepository;
use App\Repository\UserRepository;

class CommandeController extends AbstractController {
public function __construct()
{
    
}
    
    public function commandeCheck(){
        if(isset($_SESSION["user"])) {
            $cmd = new CommandeRepository();
            $usr = new UserRepository();
            $state="panier";
            $user = $usr->getUserById(($_SESSION["user"])->getId_user());
            $commId = $cmd->getCommandeById_userCheckState($user,$state);
            //dd(gettype($commId));
            if (!$commId){
                $comm = $cmd->createCommande($user);
            } else {
                $panier = new PanierRepository();
                //$crt = $panier->newPanier(4);
                $carts = $panier->getPanierbyId_commande($commId);
                
                $qtetotal = 0;
                //dump($carts["commande"]);
                foreach ($carts  as $cart ) {
                    //dump($cart);
                    //dump($cart->getQuantite());
                    $qtetotal += $cart->getQuantite();
                }
                //dump($qtetotal);
            }
        } else {
            echo 'meep';
            
        }
    }

    public function addToCart(){

    }

}