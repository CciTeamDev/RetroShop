<?php

namespace App\Controller;

use App\Core\Abstract\AbstractController;
use App\Repository\UserRepository;
use App\Entity\User;
use App\Core\Router;
use App\Core\Session;
use PDOException;

class UserController extends AbstractController{
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
            
            //include TEMPLATES . DIRECTORY_SEPARATOR . "user" . DIRECTORY_SEPARATOR . "signup.php"; //??
            $this->render('user/signup.php',[]);
            
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
                $error_messages[] = "adresse inexistant";
            }
            if ($signup_post["cp"] === false) {
                $error_messages[] = "cp inexistant";
            }
            if ($signup_post["ville"] === false) {
                $error_messages[] = "ville inexistant";
            }
            if ($signup_post["tel"] === false) {
                $error_messages[] = "tel inexistant";
            }
            //dump($signup_post,$error_messages,empty($error_messages));
            if(empty($error_messages)) {
                try{
                        //dd($args);
                        $userDao = new UserRepository();
                        $exist_user = $userDao->getUserByEmail($signup_post["email"]);
                        //dump($exist_user,is_null($exist_user));

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
                            //dd($signup_post);
                        $userDao->addUser($signup_user);
                        header("Location:../");
                        exit;
                        }else{
                            $error_messages[] = "Cet email est déjà utilisé";
                            //dump($error_messages);
                            //include TEMPLATES . DIRECTORY_SEPARATOR . "user" . DIRECTORY_SEPARATOR . "signup.php";
                            $this->render('user/signup.php',[
                                "errors" => $error_messages

                            ]);
                        }
                    } catch (PDOException $e) {
                    echo $e->getMessage();
                }
            } else {
                $this->render('user/signup.php',["errors" => $error_messages]);
            }
        }

    }

    public function userSignin(){
        if (isset($_SESSION["user"])) {
            header("Location:");
            exit;
        }
        
        if (empty($_POST)) {
            //include TEMPLATES . DIRECTORY_SEPARATOR . "signin.php";
            $this->render('user/signin.php',[]);
        } else {
            $args = [
                "email" => [
                    "filter" => FILTER_VALIDATE_EMAIL
                ],
                "pwd" => []
            ];
        
            $signin_user = filter_input_array(INPUT_POST, $args);
        
            if ($signin_user["email"] === false) {
                $error_messages[] = "Email inexistant";
            }
        
            if (empty(trim($signin_user["pwd"]))) {
                $error_messages[] = "Mot de passe inexistant";
            }
        
            if (empty($error_messages)) {
                $signin_user = (new User())
                    ->setEmail($signin_user["email"])
                    ->setPwd($signin_user["pwd"]);

                
        
                try {
                    $userDao = new UserRepository();
                    $user = $userDao->getUserByEmail($signin_user->getEmail());
                    //$var = "a";
                    if (!is_null($user)) {
                        //dd($signin_user->getPwd(),password_hash($signin_user->getPwd(),PASSWORD_DEFAULT),$user->getPwd(),password_hash($var,PASSWORD_DEFAULT));
                        if (password_verify(
                            $signin_user->getPwd(),
                            $user->getPwd())) {
                                

                                //dd($user,$user->getId_user());
                            $user = $userDao->getUserById($user->getId_user()); //erreur
                            
                            session_regenerate_id(true);
                            $_SESSION["user"] = serialize($user);
                            header("Location:../");
                            exit;
                        } else {
                            $error_messages[] = "Mot de passe erroné";
                            $this->render('user/signin.php',["errors" => $error_messages]);
                            //include TEMPLATES . DIRECTORY_SEPARATOR . "signin.php";
                        }
                    } else {
                        $error_messages[] = "Email erroné";
                        $this->render('user/signin.php',["errors" => $error_messages]);
                        //include TEMPLATES . DIRECTORY_SEPARATOR . "signin.php";
                    }
                } catch (PDOException $e) {
                    echo $e->getMessage();
                }
            } else {
                $this->render('user/signin.php',[]);
                //include TEMPLATES . DIRECTORY_SEPARATOR . "signin.php";
            }
        }
    }

    public function userSignout() {
        session_destroy();
        unset($_SESSION);
        $params = session_get_cookie_params();
        setcookie(
            session_name(),
            null,
            strtotime('yesterday'),
            $params["path"], $params["domain"],
            $params["secure"], $params["httponly"]
        );

        header("Location:signin");
        exit;
    }

    public function userShow($user_id){
        if ($user_id !== false) {
            try {
                $userDao = new UserRepository();
                $user = $userDao->getUserById($user_id);
                
                if (!is_null($user)) {
                    $this->render('user/show_user.php',["user" => $user]);
                } else {
                    header("Location:../");
                    exit;
                }
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        } else {
            header("Location:../");
            exit;
        }
    }

    public function userUpdate($user_id){
        if ($user_id !== false) {
            try {
                $userDao = new UserRepository();
                $user = $userDao->getUserById($user_id);
                $genres = (new GenreRepository())->getAllGenre();
                $groupes = (new GroupeRepository())->getAllGroupe();
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        
            if (empty($_POST)) {
                if (!is_null($user)) {
                    require TEMPLATES . DIRECTORY_SEPARATOR . "edit_user.php";
                } else {
                    header("Location:" . ROOT . "display_articles_controller.php");
                    exit;
                }
            } else {
                $args = [
                    "nom" => [
                        "filter" => FILTER_VALIDATE_REGEXP,
                        "options" => [
                            "regexp" => "#^[A-Z]#"
                        ]
                    ],
                    "prenom" => [
                        "filter" => FILTER_VALIDATE_REGEXP,
                        "options" => [
                            "regexp" => "#^[A-Z]#"
                        ]
                    ],
                    "pseudo" => [
                        "filter" => FILTER_VALIDATE_REGEXP,
                        "options" => [
                            "regexp" => "#^[\w\s-]+$#u"
                        ]
                    ],
                    "email" => [
                        "filter" => FILTER_VALIDATE_EMAIL
                    ],
                    "pwd" => [],
                    "genre" => [
                        "filter" => FILTER_VALIDATE_INT
                    ],
                    "groupe" => [
                        "filter" => FILTER_VALIDATE_INT
                    ]
                ];
        
                $edit_post = filter_input_array(INPUT_POST, $args);
        
                if (empty($_POST["nom"])) $edit_post["nom"] = null;
                if (empty($_POST["prenom"])) $edit_post["prenom"] = null;
                if (empty($_POST["genre"])) $edit_post["genre"] = null;
                if (empty($_POST["groupe"])) $edit_post["groupe"] = null;
        
                if ($edit_post["nom"] === false) {
                    $error_messages[] = "Nom inexistant";
                }
        
                if ($edit_post["prenom"] === false) {
                    $error_messages[] = "Prénom inexistant";
                }
        
                if ($edit_post["pseudo"] === false) {
                    $error_messages[] = "Pseudo inexistant";
                }
        
                if ($edit_post["email"] === false) {
                    $error_messages[] = "Email inexistant";
                }
        
                if (empty(trim($edit_post["pwd"]))) {
                    $error_messages[] = "Mot de passe inexistant";
                }
        
                if ($edit_post["genre"] === false) {
                    $error_messages[] = "Genre inexistant";
                }
        
                if ($edit_post["groupe"] === false) {
                    $error_messages[] = "Groupe inexistant";
                }
        
                if (empty($error_messages)) {
                    foreach ($genres as $genre) {
                        if ($genre->getId_genre() === $edit_post["genre"]) $edit_post["genre"] = $genre->getType();
                    }
                    foreach ($groupes as $groupe) {
                        if ($groupe->getId_group() === $edit_post["groupe"]) $edit_post["groupe"] = $groupe->getNom();
                    }
        
                    $edit_user = (new User)
                        ->setId_user($user_id)
                        ->setNom($edit_post["nom"])
                        ->setPrenom($edit_post["prenom"])
                        ->setPseudo($edit_post["pseudo"])
                        ->setEmail($edit_post["email"])
                        ->setPwd(password_hash($edit_post["pwd"], PASSWORD_DEFAULT))
                        ->setGenre($edit_post["genre"])
                        ->setGroup($edit_post["groupe"]);
        
                    try {
                        $userDao->updateUser($edit_user);
                        header("Location:show");
                        exit;
                    } catch (PDOException $e) {
                        echo $e->getMessage();
                    }
                } else {
                    try {
                        $userDao = new UserRepository();
                        $user = $userDao->getUserById($user_id);
                        $genres = (new GenreRepository())->getAllGenre();
                        $groupes = (new GroupeRepository())->getAllGroupe();
                    } catch (PDOException $e) {
                        echo $e->getMessage();
                    }
                    require TEMPLATES . DIRECTORY_SEPARATOR . "edit_user.php";
                }
            }
        } else {
            header("Location:" . HTTP . "article");
            exit;
        }
    }
}
