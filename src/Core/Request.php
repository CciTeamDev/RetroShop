<?php

namespace App\Core;

class Request  {
    public function getUri(){
        return $_SERVER['REQUEST_URI'];
    }

    public function getMethod(){
        return $_SERVER['REQUEST_METHOD'];
    }

    public function getFilenameExtension()
    {
        $path = pathinfo($this->getScriptFileName());
        return $path["extension"];
    }

    public function getScriptFileName(){
        return $_SERVER["SCRIPT_FILENAME"];
    }
}