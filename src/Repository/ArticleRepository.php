<?php

namespace App\Repository;

use App\Core\Database\AcceseurDB;
use App\Entity\Produit;
use App\Entity\Article;
use App\Entity\NoteProduit;
use PDO;

class ArticleRepository
{
    private PDO $pdo;

    public function __construct()
    {
        $objectDB = new AcceseurDB();

        $this->pdo = $objectDB->getPDO();
    }

    public function getArticles()
    {
        $req = $this->pdo->query("SELECT * FROM produit order by date_en_ligne desc limit 5");
        return $req->fetchAll();
    }

    public function getOneArticle(int $id)
    {
        $req = $this->pdo->prepare("SELECT * 
                                    FROM produit 
                                    WHERE id_produit = :id_produit");
        $req->execute([":id_produit" => $id]);

        $result = $req->fetch(PDO::FETCH_ASSOC);

        if(!empty($result)){
            return (new Produit())
            ->setId_produit($result["id_produit"])
            ->setRef($result["ref"])
            ->setNom_produit($result["nom_produit"])
            ->setDescrip($result["descrip"])
            ->setPrix_unitaire($result["prix_unitaire"])
            ->setDate_en_ligne($result["date_en_ligne"]);
        }else{
            return "Le produit n'existe pas !";
        }
    }

    public function searchArticle($productSearched)
    {
        $req = $this->pdo->query("SELECT * FROM produit WHERE nom_produit LIKE '%$productSearched%' ");
        return $req->fetchAll();
    }

    public function oneCateg($params)
    {
        $req = $this->pdo->query("SELECT * FROM produit INNER JOIN produit_categorie 
        ON produit.id_produit =	produit_categorie.id_produit
        WHERE produit_categorie.id_categorie = $params");
        
        

        
       
        return $req->fetchAll();  
    }

    public function addRemarkAndNote(NoteProduit $avis): void{
        $req = $this->pdo->prepare("INSERT INTO note_produit (note, commentaire) 
                                    VALUES (:note, :commentaire)");

        $req->execute([
            ":note" => $avis->getNote(),
            ":commentaire" => $avis->getCommentaire()
        ]);
    }

    public function showRemarkAndNote()
    {
        $req = $this->pdo->query("SELECT * FROM note_produit ORDER BY id_user");

        return $req->fetchAll();
    }
}
