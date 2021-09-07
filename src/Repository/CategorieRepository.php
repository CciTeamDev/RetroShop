<?php

namespace App\Repository;

use App\Core\Database\AcceseurDB;
use PDO;

class CategorieRepository
{
    private PDO $pdo;

    public function __construct()
    {
        $objectDB = new AcceseurDB();

        $this->pdo = $objectDB->getPDO();
    }

    public function getArticlesByCategorie($categorie)
    {
        $req = $this->pdo->query("SELECT * FROM produit INNER JOIN produit_categorie 
        ON produit.id_produit =	produit_categorie.id_produit
        where produit_categorie.id_categorie = $categorie");
    
        return $req->fetchAll();
    }
}
