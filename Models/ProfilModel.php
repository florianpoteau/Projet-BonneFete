<?php

namespace App\Models;

require_once 'Database.php';
require_once 'Models/Profil.php';

use App\Database;

use PDO;

class ProfilModel
{
    private $connection;

    public function __construct()
    {
        $this->connection = new Database();
    }
    public function getAll()
    {
        $query = $this->connection->getPdo()->prepare("SELECT id_profil,email_profil, mdp_profil, nom_profil, FROM post");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_CLASS, "App\Models\Profil");
    }
}
