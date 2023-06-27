<?php

namespace App\Models;

require_once 'Database.php';
require_once 'Models/Post.php';

use App\Database;

use PDO;

class PostModel
{
    private $connection;

    public function __construct()
    {
        $this->connection = new Database();
    }
    public function getAll()
    {
        $query = $this->connection->getPdo()->prepare("SELECT idpost,description_post FROM post");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_CLASS, "App\Models\Post");
    }
}
