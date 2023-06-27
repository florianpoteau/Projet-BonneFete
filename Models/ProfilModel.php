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
        $query = $this->connection->getPdo()->prepare("SELECT email_profil,nom_profil FROM profil");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_CLASS, "App\Models\Profil");
    }

    public function createUser($user)
    {

        try {
            $query = $this->connection->getPdo()->prepare('INSERT INTO profil (email_profil, mdp_profil, nom_profil, id_role) VALUES (:email_profil, :mdp_profil, :nom_profil, 2)');
            $query->execute([
                'email_profil' => $user['email_profil'],
                'nom_profil' => $user['nom_profil'],
                'mdp_profil' => $user['mdp_profil']
            ]);
            return "Bien enregistré";
        } catch (\PDOException $e) {
            return "une erreur est survenue";
        }
    }
}
