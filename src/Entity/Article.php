<?php

namespace App\Entity;

class User { 
    private string $name_object;

    public function __construct($name_object){
        $this->name_object=$name_object;

    }


    /**
     * Get the value of name_object
     */ 
    public function getName_object()
    {
        return $this->name_object;
    }

    /**
     * Set the value of name_object
     *
     * @return  self
     */ 
    public function setName_object($name_object)
    {
        $this->name_object = $name_object;

        return $this;
    }
}