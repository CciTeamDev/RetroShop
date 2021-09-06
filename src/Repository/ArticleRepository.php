<?php

namespace App\Repository;

use App\Core\Database\AcceseurDB;
use PDO;

class ArticleRepository
{
    private PDO $pdo;

    public function __construct()
    {
        $objectDB = new AcceseurDB();

        $this->pdo = $objectDB->getPDO();
    }

    public function getArticles()
    {
        $req = $this->pdo->query("SELECT * FROM objects");
        return $req->fetchAll();
    }
}
