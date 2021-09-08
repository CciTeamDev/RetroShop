<?php

namespace App\Core;

use App\Entity\User;

class Session {
    public function __construct(private ?User $user)
    {
        
    }
    
    public function getUser(): ?User {
        return $this->user;
    }
}

