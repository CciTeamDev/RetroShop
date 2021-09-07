<?php

namespace App\Controller;

use App\Core\Abstract\AbstractController;
use App\Repository\UserRepository;
use App\Entity\User;
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
               
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        
            if (empty($_POST)) {
                if (!is_null($user)) {
                    $this->render('user/edit_user.php',["user" => $user]);
                } else {
                    header("Location:../");
                    exit;
                }
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
        
                $edit_post = filter_input_array(INPUT_POST, $args);
        
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
        
                
        
                if (empty($error_messages)) {
        
                    $edit_user = (new User())
                        ->setId_user($user_id)
                        ->setNom($edit_post["nom"])
                        ->setPrenom($edit_post["prenom"])
                        ->setGenre($edit_post["genre"])
                        ->setDate_naissance($edit_post["date_naissance"])
                        ->setEmail($edit_post["email"])
                        ->setPwd(password_hash($edit_post["pwd"], PASSWORD_DEFAULT))
                        ->setAdresse($edit_post["adresse"])
                        ->setCp($edit_post["cp"])
                        ->setVille($edit_post["ville"])
                        ->setTel($edit_post["tel"]);
        
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
                        
                    } catch (PDOException $e) {
                        echo $e->getMessage();
                    }
                    $this->render('user/edit_user.php',["user" => $user]);
                }
            }
        } else {
            header("Location:../");
            exit;
        }
    }
}
