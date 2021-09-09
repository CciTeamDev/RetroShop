<?php

namespace App\Repository;


use App\Core\Database\AccesseurDB;
use App\Entity\Commande;
use App\Entity\Panier;
use App\Entity\User;
use PDO;

class CommandeRepository {
private PDO $pdo;

    public function __construct()
    {
        $userbd = new AccesseurDB();
        $this->pdo = $userbd->getPdo();
    }

    public function createCommande(User $user):void {
        $req = $this->pdo->prepare("INSERT INTO
            commande (id_user,etat,total,id_stripe)
            VALUES (:id_user,:etat,:total,:id_stripe)");
        $req->execute([
            ":id_user" => $user->getId_user(),
            ":etat" => "panier",
            ":total"=> 0,
            ":id_stripe"=>""
        ]);
    }

    public function getCommandeById_userCheckState(User $user, string $etat) {
        $req=$this->pdo->prepare("SELECT id_commande,date_commande,id_user,etat,total,id_stripe 
                                FROM commande WHERE id_user = :id_user 
                                AND etat = :etat");
        $req->execute([
            ":id_user" => $user->getId_user(),
            ":etat" => $etat
        ]);
        $req->setFetchMode(PDO::FETCH_CLASS,Commande::class);
        $result = $req->fetch();

        if(!empty($result)){
            return $result;
        } else {
            return null;
        }
    }

    public function updateCommande(){
        $req =$this->pdo->prepare("");
    }
}