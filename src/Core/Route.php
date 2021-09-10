<?php

namespace App\Core;
//match les routes dans le tableau du router
class Route{
    private string $path;
    private $callable;
    private $matches = [];

    

    public function __construct($path,$callable){
        $this->path = $path;
        $this->callable = $callable;
        
    }

    public function match(string $url):bool
    {
        //On retire les / en début et en fin de l'url
        $url = trim($url,'/');
        //trouve les éléments après " : "
        //remplace les ":xxx" par un design patern(regex)

        $path = preg_replace('#:([\w]+)#','([^/]+)',$this->path);
        // regex qui lit tout le path du début à la fin
        //permet de recréer un regex
        $regex = "#^$path$#i";
        //si url ne match pas regex => false
        if(!preg_match($regex,$url,$matches)){
            
            return false;
        }
        //Retire le premier match du tableau

        array_shift($matches);
        //on passe les param dans la propriété.
        $this->matches = $matches;
        return true;
    }


    public function call() {
        // on exec la fonction en lui passant les param relatif à la route
        return call_user_func($this->callable,$this->matches);
    }
}