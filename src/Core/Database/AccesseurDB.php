<?php

namespace App\Core\Database;

use PDO;

class AccesseurDB {
    public function getPdo(){
        return new PDO(
            'mysql:host=localhost;dbname=ecommerce;
            charset=UTF8','root',''
        );
    }
}