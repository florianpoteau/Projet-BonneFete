<?php

namespace App\Models;

require_once 'Database.php';
require_once 'Models/Profil.php';
require_once 'Models/Post.php';
require_once 'Models/Commentaire.php';

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
        $query = $this->connection->getPdo()->prepare("SELECT post.idpost, nom_profil, description_post, date_post, profil.id_profil, email_profil from profil inner join post on profil.id_profil = post.id_profil  order by post.idpost DESC");
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

    public function getEmail($email)
    {

        $query = $this->connection->getPdo()->prepare('SELECT email_profil FROM profil WHERE email_profil = :email');
        $query->execute(['email' => $email]);

        return $query->fetch(PDO::FETCH_ASSOC);
    }

    public function getUserByUsername($username)
    {
        $query = $this->connection->getPdo()->prepare('SELECT nom_profil FROM profil WHERE nom_profil = :nom_profil');
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
            $query = $this->connection->getPdo()->prepare('SELECT id_profil, nom_profil, id_role, email_profil FROM profil WHERE nom_profil = :nom_profil');
            $query->execute([
                "nom_profil" => $nom
            ]);
            $userCo = $query->fetch(PDO::FETCH_ASSOC);

            $_SESSION['nom_profil'] = $nom;
            $_SESSION['id_profil'] = $userCo['id_profil'];
            $_SESSION['id_role'] = $userCo['id_role'];
            $_SESSION['email_profil'] = $userCo['email_profil'];
            $_SESSION['mdp_profil'] = $password;
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
        $date_post = date('Y-m-d H:i:s');
        $query = $this->connection->getPdo()->prepare('INSERT INTO post (id_profil, description_post, date_post) VALUES(:id_profil, :description_post, :date_post)');
        $query->execute([
            "id_profil" => $id_profil,
            "description_post" => $description,
            "date_post" => $date_post
        ]);
        header('Location: ../profil/accueil');
    }

    public function change($user)
    {
        $query = $this->connection->getPdo()->prepare('UPDATE post SET description_post = :description_post WHERE idpost = :idpost');
        $query->execute([
            "description_post" => $user['description_post'],
            "idpost" => $user['idpost']
        ]);
    }

    public function delete($post)
    {
        $idpost = $post['idpost'];

        $queryProfile = $this->connection->getPdo()->prepare('DELETE FROM profil WHERE idpost = :idpost');
        $queryProfile->execute([
            "idpost" => $idpost
        ]);

        $queryPost = $this->connection->getPdo()->prepare('DELETE FROM post WHERE idpost = :idpost');
        $queryPost->execute([
            "idpost" => $idpost
        ]);
    }

    public function changePassword($user)
    {
        $hashedPassword = password_hash($user['mdp_profil'], PASSWORD_DEFAULT);

        try {
            $query = $this->connection->getPdo()->prepare('UPDATE profil set mdp_profil = :mdp_profil WHERE id_profil = :id_profil ');
            $query->execute([
                'id_profil' => $user['id_profil'],
                'mdp_profil' => $hashedPassword
            ]);
            return "Bien enregistré";
        } catch (\PDOException $e) {
            return "une erreur est survenue";
        }
    }

    public function allPostByProfil()
    {
        $id_profil = $_SESSION['id_profil'];

        $query = $this->connection->getPdo()->prepare('SELECT post.idpost, post.description_post FROM post INNER JOIN profil ON post.id_profil = profil.id_profil WHERE profil.id_profil = :id_profil');
        $query->execute([
            'id_profil' => $id_profil
        ]);

        return $query->fetchAll(PDO::FETCH_CLASS, "App\Models\Profil");
    }

    public function deleteProfilById($user)
    {

        $id_profil =  $_SESSION['id_profil'];

        $queryProfile = $this->connection->getPdo()->prepare('DELETE FROM profil WHERE id_profil = :id_profil');
        $queryProfile->execute([
            "id_profil" => $id_profil
        ]);
    }

    public function getPostsById($id_profil)
    {
        $query = $this->connection->getPdo()->prepare("SELECT post.idpost, post.description_post, post.date_post, profil.id_profil, profil.email_profil, profil.mdp_profil, profil.nom_profil, profil.id_role
    FROM post
    INNER JOIN profil ON post.id_profil = profil.id_profil
    WHERE profil.id_profil = :id_profil");
        $query->bindValue(':id_profil', $id_profil, PDO::PARAM_INT);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addComments($user, $idpost)
    {
        $id_profil = $_SESSION['id_profil'];
        $commentaire = $user['commentaire'];
        $date_commentaire = date('Y-m-d H:i:s');
        $query = $this->connection->getPdo()->prepare('INSERT INTO commentaire (id_profil, idpost, commentaire, date_commentaire) VALUES(:id_profil, :idpost, :commentaire, :date_commentaire)');
        $query->execute([
            "id_profil" => $id_profil,
            'idpost' => $idpost,
            "commentaire" => $commentaire,
            "date_commentaire" => $date_commentaire
        ]);
    }

    public function getCommentaires()
    {
        $query = $this->connection->getPdo()->prepare('SELECT commentaire, date_commentaire, commentaire.idpost, profil.nom_profil, date_commentaire from commentaire inner join post on post.idpost= commentaire.idpost INNER JOIN profil ON profil.id_profil = commentaire.id_profil');
        $query->execute();
        return $query->fetchAll(PDO::FETCH_CLASS, "App\Models\Commentaire");
    }

    public function deleteCommentsWithPost($post)
    {
        $idpost = $post['idpost'];

        // Supprimer les commentaires associés au post
        $queryComment = $this->connection->getPdo()->prepare('DELETE FROM commentaire WHERE idpost = :idpost');
        $queryComment->execute([
            "idpost" => $idpost
        ]);

        // Supprimer le post lui-même
        $queryPost = $this->connection->getPdo()->prepare('DELETE FROM post WHERE idpost = :idpost');
        $queryPost->execute([
            "idpost" => $idpost
        ]);
    }

    public function getAllProfil()
    {
        $query = $this->connection->getPdo()->prepare("SELECT profil.nom_profil, profil.id_profil, profil.email_profil, role.libelle_role
        FROM profil
        INNER JOIN post ON profil.id_profil = post.id_profil
        inner join role on role.id_role = profil.id_role
        GROUP BY profil.nom_profil, profil.id_profil");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_CLASS, "App\Models\Profil");
    }
}
