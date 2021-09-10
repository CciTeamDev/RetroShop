<?php

namespace App\Core;

class Request  {
    public function getUri(){
        return $_SERVER['REQUEST_URI'];
    }

    public function getMethod(){
        return $_SERVER['REQUEST_METHOD'];
    }
}