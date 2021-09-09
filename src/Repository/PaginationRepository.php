<?php

namespace App\Repository;

use App\Core\Database\AcceseurDB;
use PDO;
use ReflectionClass;

class PaginationRepository
{
    private PDO $pdo;

    public function __construct()
    {
        $objectDB = new AcceseurDB();

        $this->pdo = $objectDB->getPDO();
    }

    // a faire : automatiser catégorie ici

    // fonction limit et offset
    public function paginate(string $class, ?int $multiplicateur, ?int $categorie,int $limit=2, int $offset=0, ) 
    {
        if (is_int($multiplicateur)  && $multiplicateur !==0){
            $offset = $limit * $multiplicateur;
            $offset -= $limit;
        }
        
        $refleClass = new ReflectionClass($class);
        
        $className = $refleClass->getShortName();

        $req = $this->pdo->query("SELECT * FROM $className INNER JOIN produit_categorie 
        ON produit.id_produit =	produit_categorie.id_produit
        WHERE produit_categorie.id_categorie = $categorie LIMIT $limit OFFSET $offset");
       
        //$req = $this->pdo->query("SELECT * FROM $className LIMIT $limit OFFSET $offset");
        
        //pdo::fetch_class permet de préciser à PDO de nous créer des objets d'une classe précise par son namespace
        //  $req->execute([
        //     ":classname"=>$className,
        //     //":limitation" =>3,
        //     //":offset" =>0
        // ]);
        
        $req->setFetchMode(PDO::FETCH_CLASS, $class);
        
       
        return $req->fetchAll();  
         
    }
    
  

}
