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
        $query = $this->connection->getPdo()->prepare("SELECT nom_profil, mdp_profil FROM profil");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_CLASS, "App\Models\Profil");
    }

    public function createUser($user)
    {

        try {
            $query = $this->connection->getPdo()->prepare('INSERT INTO profil (email_profil, mdp_profil, nom_profil, id_role) VALUES (:email_profil, :mdp_profil, :nom_profil, 1)');
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

    // public function login(array $user)
    // {
    //     $email = $user['email_profil'];
    //     $password = $user['mdp_profil'];

    //     $query = $this->connection->getPdo()->prepare('SELECT mdp_profil FROM profil WHERE email_profil = :email_profil');
    //     $query->execute([
    //         "email_profil" => $email
    //     ]);
    //     $bdd_pass = $query->fetch(\PDO::FETCH_ASSOC);
    //     if (password_verify($password, $bdd_pass['mdp_profil'])) {
    //         $query = $this->connection->getPdo()->prepare('SELECT nom_profil FROM profil WHERE email_profil = :email_profil');
    //         $query->execute([
    //             "email_profil" => $email
    //         ]);
    //         $userCo = $query->fetch(\PDO::FETCH_ASSOC);
    //         $_SESSION['nom_profil'] = $email;
    //     }
    // }
}
