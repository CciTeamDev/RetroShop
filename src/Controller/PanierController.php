<?php

namespace App\Controller;

use App\Core\Abstract\AbstractController;
use App\Repository\PanierRepository;

class PanierController extends AbstractController {
    public function nouveauPanier($id_commande) {
        
        $panier = new PanierRepository();
        $cart = $panier->newPanier($id_commande);
        dump($cart);
    }
}