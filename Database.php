<?php

namespace App;

use PDO;

class Database
{
    protected $pdo;

    public function __construct()
    {
        $this->pdo = new PDO("mysql:host=localhost;dbname=bonnefete", "ad_bonneFete!", "B0neU_F&tee?!");
    }

    public function getPdo()
    {
        return $this->pdo;
    }
}
