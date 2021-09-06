<?php

namespace App\Repository;

use App\Core\Database\AccesseurDB;
use App\Entity\User;
use PDO;

class UserRepository {
private PDO $pdo;

    public function __construct()
    {
        $userbd = new AccesseurDB;
        $userbd -> getPdo();
    }

    public function addUser(User $user):Void
    {
        $req = $this->pdo->prepare("INSERT INTO 
                                    user (nom,prenom,genre,date_naissance,email,pwd,adresse,cp,ville,tel) 
                                    VALUES (:nom,:prenom,:genre,:date_naissance,:email,:pwd,:adresse,:cp,:ville,:tel)");
        $req->execute([
            
            ":nom" => $user->getNom(),
            ":prenom" => $user->getPrenom(),
            ":genre" => $user->getGenre(),
            ":date_naissance" => $user->getDate_naissance(),
            ":email" => $user->getEmail(),
            ":pwd"=>$user->getPwd(),
            ":adresse"=>$user->getAdresse(),
            ":cp"=>$user->getCp(),
            ":ville"=>$user->getVille(),
            ":tel"=>$user->getTel()
        ]);
    }

    public function getUserById(int $id):?User
    {
        $req = $this->pdo->prepare("SELECT * FROM user");
        $req->execute(["id_user => $id"]);
        $result = $req->fetch(PDO::FETCH_ASSOC);
        if(!empty($result)){
            return(new User())
            ->setId_user($result["id"])
            ->setNom($result["nom"])
            ->setPrenom($result["Prenom"])
            ->setGenre($result["Genre"])
            ->setDate_naissance($result["Date_naissance"])
            ->setEmail($result["Email"])
            ->setDate_creation($result["Date_creation"])
            ->setAdresse($result["Adresse"])
            ->setCp($result["Cp"])
            ->setVille($result["Ville"])
            ->setTel($result["Tel"]);
        } else {
            return null;
        }
    }

    public function getUserByEmail(string $email): ?User
    {
        $req = $this->pdo->prepare(
            "SELECT id_user,email FROM user WHERE email =:email"
        );
        $req->execute([":email"=>$email]);
        $result = $req->fetch(PDO::FETCH_ASSOC);
        if(!empty($result)) {
            return (new User())
                ->setId_user($result["id_user"])
                ->setEmail($result["email"]);
        } else {
            return null;
        }
    }
}