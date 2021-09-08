<?php

namespace App\Repository;

use App\Core\Database\AccesseurDB;
use App\Entity\User;
use PDO;

class UserRepository {
private PDO $pdo;

    public function __construct()
    {
        $userbd = new AccesseurDB();
        $this->pdo = $userbd -> getPdo();
    }

    public function addUser(User $user):Void
    {
        $req = $this->pdo->prepare("INSERT INTO 
                                    user (nom,prenom,genre,date_naissance,email,mot_passe,adresse,cp,ville,tel) 
                                    VALUES (:nom,:prenom,:genre,:date_naissance,:email,:mot_passe,:adresse,:cp,:ville,:tel)");
        $req->execute([
            
            ":nom" => $user->getNom(),
            ":prenom" => $user->getPrenom(),
            ":genre" => $user->getGenre(),
            ":date_naissance" => $user->getDate_naissance(),
            ":email" => $user->getEmail(),
            ":mot_passe"=>$user->getmot_passe(),
            ":adresse"=>$user->getAdresse(),
            ":cp"=>$user->getCp(),
            ":ville"=>$user->getVille(),
            ":tel"=>$user->getTel()
        ]);
    }

    public function getUserById(int $id):?User
    {
        $req = $this->pdo->prepare("SELECT id_user,nom,prenom,genre,date_naissance,email,adresse,cp,ville,tel,date_creation
        FROM user WHERE id_user = :id_user");
        
        $req->execute([":id_user" => $id]);
        $result = $req->fetch(PDO::FETCH_ASSOC);
        
        if(!empty($result)){
            return(new User())
            ->setId_user($result["id_user"])
            ->setNom($result["nom"])
            ->setPrenom($result["prenom"])
            ->setGenre($result["genre"])
            ->setDate_naissance($result["date_naissance"])
            ->setEmail($result["email"])
            ->setAdresse($result["adresse"])
            ->setCp($result["cp"])
            ->setVille($result["ville"])
            ->setTel($result["tel"])
            ->setDate_creation($result["date_creation"]);
        } else {
            return null;
        }
    }

    public function getUserByEmail(string $email): ?User
    {
        $req = $this->pdo->prepare(
            "SELECT id_user,email,mot_passe FROM user WHERE email =:email"
        );
        $req->execute([":email"=>$email]);
        $result = $req->fetch(PDO::FETCH_ASSOC);
        if(!empty($result)) {
            return (new User())
                ->setId_user($result["id_user"])
                ->setEmail($result["email"])
                ->setmot_passe($result["mot_passe"]);
        } else {
            return null;
        }
    }

    public function updateUser(User $user): void
    {
        $req = $this->pdo->prepare("UPDATE user
                                    SET nom = :nom,
                                        prenom = :prenom,
                                        genre = :genre,
                                        date_naissance = :date_naissance,
                                        email = :email,
                                        mot_passe = :mot_passe,
                                        adresse = :adresse,
                                        cp = :cp,
                                        ville = :ville,
                                        tel = :tel
                                    WHERE id_user = :id_user
        ");
        $req->execute([
            ":id_user" => $user->getId_user(),
            ":nom" => $user->getNom(),
            ":prenom" => $user->getPrenom(),
            ":genre" => $user->getGenre(),
            ":date_naissance" => $user->getDate_naissance(),
            ":email" => $user->getEmail(),
            ":mot_passe" => $user->getmot_passe(),
            ":adresse" => $user->getAdresse(),
            ":cp"=> $user->getCp(),
            ":ville"=> $user->getVille(),
            ":tel"=> $user->getTel()
            
        ]);
    }
}