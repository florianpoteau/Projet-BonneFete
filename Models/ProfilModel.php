<?php

namespace App\Models;

require_once 'Database.php';
require_once 'Models/Profil.php';
require_once 'Models/Post.php';

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
        $query = $this->connection->getPdo()->prepare("SELECT post.idpost, nom_profil, description_post from profil inner join post on profil.id_profil = post.id_profil");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_CLASS, "App\Models\Profil");
    }

    public function createUser($user)
    {

        $existingUser = $this->getUserByUsername($user['nom_profil']);

        if ($existingUser) {
            return "Nom d'utilisateur déjà utilisé";
        } else {

            $hashedPassword = password_hash($user['mdp_profil'], PASSWORD_DEFAULT);

            try {
                $query = $this->connection->getPdo()->prepare('INSERT INTO profil (email_profil, mdp_profil, nom_profil, id_role) VALUES (:email_profil, :mdp_profil, :nom_profil, 1)');
                $query->execute([
                    'email_profil' => $user['email_profil'],
                    'nom_profil' => $user['nom_profil'],
                    'mdp_profil' => $hashedPassword
                ]);
                return "Bien enregistré";
            } catch (\PDOException $e) {
                return "une erreur est survenue";
            }
        }
    }

    private function getUserByUsername($username)
    {
        $query = $this->connection->getPdo()->prepare('SELECT * FROM profil WHERE nom_profil = :nom_profil');
        $query->execute(['nom_profil' => $username]);

        return $query->fetch(PDO::FETCH_ASSOC);
    }

    public function login(array $user)
    {
        $nom = $user['nom_profil'];
        $password = $user['mdp_profil'];

        $query = $this->connection->getPdo()->prepare('SELECT id_profil, mdp_profil FROM profil WHERE nom_profil = :nom_profil');
        $query->execute([
            "nom_profil" => $nom
        ]);
        $result = $query->fetch(PDO::FETCH_ASSOC);

        if ($result && password_verify($password, $result['mdp_profil'])) {
            // Les informations d'identification sont valides, connectez l'utilisateur
            $query = $this->connection->getPdo()->prepare('SELECT id_profil, nom_profil FROM profil WHERE nom_profil = :nom_profil');
            $query->execute([
                "nom_profil" => $nom
            ]);
            $userCo = $query->fetch(PDO::FETCH_ASSOC);
            $_SESSION['nom_profil'] = $nom;
            $_SESSION['id_profil'] = $userCo['id_profil'];
            header('Location: ../profil/accueil');
            // require 'C:\xampp\htdocs\Projet-BonneFete\Views\post\accueil.php';
        } else {
            // Les informations d'identification sont incorrectes, affichez un message d'erreur
            echo "Nom d'utilisateur ou mot de passe incorrect";
        }
    }

    public function addPost($user)
    {
        $id_profil = $_SESSION['id_profil'];
        $description = $user['description_post'];
        $query = $this->connection->getPdo()->prepare('INSERT INTO post (id_profil, description_post) VALUES(:id_profil, :description_post)');
        $query->execute([
            "id_profil" => $id_profil,
            "description_post" => $description
        ]);
        header('Location: ../profil/accueil');
    }
}
