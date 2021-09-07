<?php
namespace App\Core\Database;

use PDO;

class AcceseurDB
{
    public function getPDO() :PDO
    {
        return new PDO(
            'mysql:host=localhost;
            dbname=ecommerce;charset=utf8', 
            'root', 
            '');
    }
}