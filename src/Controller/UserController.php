<?php

namespace App\Controller;

use App\Repository\UserRepository;
use App\Entity\User;
use App\Core\Router;
use App\Core\Session;
use PDOException;

class UserController{
    public function __construct(
        
        //private Session $session
    ) {

    }

    public function userSignup(){
        if(isset($_SESSION["user"])){
            header("Location:../uuu");
            exit;
        }

        if (empty($_POST)) {
            dump(TEMPLATES);
            include TEMPLATES . DIRECTORY_SEPARATOR . "user" . DIRECTORY_SEPARATOR . "signup.php"; //??
        } else {
            $args = [
                "nom" => [
                    "filter" => FILTER_VALIDATE_REGEXP,
                    "options" => [
                        "regexp" => "#^[\w\s-]+$#u"
                    ]
                ],
                "prenom" => [
                    "filter" => FILTER_VALIDATE_REGEXP,
                    "options" => [
                        "regexp" => "#^[\w\s-]+$#u"
                    ]
                ],
                "genre"=>[],
                "date_naissance"=>[],
                "email" => [
                    "filter" => FILTER_VALIDATE_EMAIL
                ],
                "pwd" => [],
                "date_creation"=>[],
                "adresse" => [
                    "filter" => FILTER_VALIDATE_REGEXP,
                    "options" => [
                        "regexp" => "#^[\w\s-]+$#u"
                    ]
                ],
                "cp" => [
                    "filter" => FILTER_VALIDATE_REGEXP,
                    "options" => [
                        "regexp" => "#^[\w\s-]+$#u"
                    ]
                ],
                "ville" => [
                    "filter" => FILTER_VALIDATE_REGEXP,
                    "options" => [
                        "regexp" => "#^[\w\s-]+$#u"
                    ]
                ],
                "tel" => [
                    "filter" => FILTER_VALIDATE_REGEXP,
                    "options" => [
                        "regexp" => "#^[\w\s-]+$#u"
                    ]
                ]
            ];
        
            $signup_post = filter_input_array(INPUT_POST, $args);
        
            if ($signup_post["nom"] === false) {
                $error_messages[] = "Pseudo inexistant";
            }
            if ($signup_post["prenom"] === false) {
                $error_messages[] = "Pseudo inexistant";
            }
            if ($signup_post["email"] === false) {
                $error_messages[] = "Email inexistant";
            }
            if (empty(trim($signup_post["pwd"]))) {
                $error_messages[] = "Mot de passe inexistant";
            }
            if ($signup_post["adresse"] === false) {
                $error_messages[] = "Email inexistant";
            }
            if ($signup_post["cp"] === false) {
                $error_messages[] = "Email inexistant";
            }
            if ($signup_post["ville"] === false) {
                $error_messages[] = "Email inexistant";
            }
            if ($signup_post["tel"] === false) {
                $error_messages[] = "Email inexistant";
            }

            if(empty($error_messages)) {
                try{
                    $userDao = new UserRepository();
                    $exist_user = $userDao->getUserByEmail($signup_post["email"]);

                    if (is_null($exist_user)) {
                        $signup_user = (new User())
                        ->setNom($signup_post["nom"])
                        ->setPrenom($signup_post["prenom"])
                        ->setGenre($signup_post["genre"])
                        ->setDate_naissance($signup_post["date_naissance"])
                        ->setEmail($signup_post["email"])
                        ->setPwd(password_hash($signup_post["pwd"],PASSWORD_DEFAULT))
                        ->setAdresse($signup_post["adresse"])
                        ->setCp($signup_post["cp"])
                        ->setVille($signup_post["ville"])
                        ->setTel($signup_post["tel"]);
                    $userDao->addUser($signup_user);
                    header("Location:../uu");
                    exit;
                    }else{
                        $error_messages[] = "Cet email est déjà utilisé";
                        include TEMPLATES . DIRECTORY_SEPARATOR . "user" . DIRECTORY_SEPARATOR . "signup.php";
                    }
                } catch (PDOException $e) {
                    echo $e->getMessage();
                }
            }
        }

    }
}