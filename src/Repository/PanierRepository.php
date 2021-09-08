<?php

namespace App\Repository;

use App\Core\Database\AccesseurDB;
use App\Entity\Article;
use App\Entity\Panier;
use PDO;

class PanierRepository {
    private PDO $pdo;

    public function __construct()
    {
        $userbd = new AccesseurDB();
        $this->pdo = $userbd->getPdo();
    }

    public function newPanier($id_commande){
        $req = $this->pdo->prepare(
        "INSERT INTO panier (id_commande,id_produit,quantite) 
                        VALUES ( :id_commande,:id_produit,:quantite) ");
        $req->execute([
            ":id_commande" => $id_commande,
            ":id_produit" => 5,
            ":quantite" => 5
        ]);
    }

    public function getPanierbyId(int $id_panier) {
        $req = $this->pdo->prepare("SELECT * FROM panier WHERE id_panier = :id_panier");
        $req->execute([
            ":id_panier" => $id_panier
        ]);
        $req->setFetchMode(PDO::FETCH_CLASS,Panier::class);
        $result = $req->fetch();
        if(!empty($result)){
            return $result;
        } else {
            return null;
        }
    }

    public function updatePanier(Panier $panier){
        $article = new Article();
        $req = $this->pdo->prepare("UPDATE panier SET id_produit = :id_produit, quantite = :quantite WHERE id_panier = :id_panier");
        $req->execute([
            ":id_produit" => $panier->addItem($article),
            ":quantite" => $panier->addQte($article)
        ]);
    }

}