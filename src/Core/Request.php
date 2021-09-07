<?php

namespace App\Core;
// execute les méthodes quand on essaye de se connecter
class Request  {
    public function getUri(){
        return $_SERVER['REQUEST_URI'];
    }

    public function getMethod(){
        return $_SERVER['REQUEST_METHOD'];
    }
}