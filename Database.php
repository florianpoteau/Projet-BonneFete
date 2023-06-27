<?php


namespace App;

use PDO;

require_once 'DotEnv.php';

use DevCoder\DotEnv;

(new DotEnv(__DIR__ . '/.env'))->load();

class Database
{
    protected $pdo;

    public function __construct()
    {
        $this->pdo = new PDO("mysql:host=localhost;dbname=" . getenv('DB_NAME') . ";charset=utf8", getenv('DB_USERNAME'), getenv('DB_PASSWORD'));
    }

    public function getPdo()
    {
        return $this->pdo;
    }
}
