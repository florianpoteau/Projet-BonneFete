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
        $query = $this->connection->getPdo()->prepare("SELECT post.idpost, nom_profil, description_post, date_post, profil.id_profil, email_profil from profil inner join post on profil.id_profil = post.id_profil  order by post.idpost DESC LIMIT 30");
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

                $id_profil = $this->connection->getPdo()->lastInsertId();

                $query = $this->connection->getPdo()->prepare("INSERT INTO `log` (`action`, id_profil) VALUES('a créé un compte', :id_profil)");
                $query->execute([
                    'id_profil' => $id_profil
                ]);
                return "Bien enregistré";
            } catch (\PDOException $e) {
                return "une erreur est survenue";
            }
        }
    }

    public function lastInsertId()
    {
        $query = $this->connection->getPdo()->prepare('SELECT id_profil from profil ORDER BY id_profil DESC LIMIT 1');
        $query->execute();

        $result = $query->fetch(PDO::FETCH_ASSOC);

        if ($result !== false) {
            $id_profil = $result['id_profil'];
            return $id_profil;
        } else {
            return null; // Ou une valeur par défaut si aucun idpost n'est trouvé
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

            $id_profil = $userCo['id_profil'];

            $query = $this->connection->getPdo()->prepare("INSERT INTO `log` (`action`, id_profil) VALUES(:action, :id_profil)");
            $query->execute([
                'action' => "s'est connecté",
                'id_profil' => $id_profil
            ]);
            header('Location: ../profil/accueil');
            return "Bien enregistré";

            // require 'C:\xampp\htdocs\Projet-BonneFete\Views\post\accueil.php';
        } else {
            // Les informations d'identification sont incorrectes, affichez un message d'erreur
?>

            <script>
                alert("Nom d'utilisateur ou mot de passe incorrect");
                window.location.href = "../profil/login";
            </script>



<?php
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


        $query = $this->connection->getPdo()->prepare("INSERT INTO `log` (`action`, id_profil) VALUES('a créé un post', :id_profil)");
        $query->execute([
            "id_profil" => $id_profil,
        ]);



        header('Location: ../profil/accueil');
    }

    // ajout image

    public function addImage($file, $idpost)
    {

        $query = $this->connection->getPdo()->prepare('INSERT INTO file (name, idpost) VALUES (?, ?)');
        $query->execute([$file, $idpost]);
        echo "Image enregistrée";
    }

    public function getLastInsertId()
    {
        $query = $this->connection->getPdo()->prepare('SELECT idpost from post ORDER BY idpost DESC LIMIT 1');
        $query->execute();

        $result = $query->fetch(PDO::FETCH_ASSOC);

        if ($result !== false) {
            $idpost = $result['idpost'];
            return $idpost;
        } else {
            return null; // Ou une valeur par défaut si aucun idpost n'est trouvé
        }
    }

    // Selectionner les images

    public function getImage()
    {

        $query = $this->connection->getPdo()->prepare('SELECT name, idpost from file');
        $query->execute();
        $images = $query->fetchAll(PDO::FETCH_ASSOC);

        return $images;
    }

    public function change($user)
    {
        $query = $this->connection->getPdo()->prepare('UPDATE post SET description_post = :description_post WHERE idpost = :idpost');
        $query->execute([
            "description_post" => $user['description_post'],
            "idpost" => $user['idpost']
        ]);

        $id_profil = $_SESSION['id_profil'];

        $query = $this->connection->getPdo()->prepare("INSERT INTO `log` (`action`, id_profil) VALUES('a modifié un post', :id_profil)");
        $query->execute([
            'id_profil' => $id_profil
        ]);
        return "Bien enregistré";
    }


    // Fonction qui supprime un post complet avec les images, les commentaires etc

    public function delete($post)
    {
        $idpost = $post['idpost'];

        // Supprimer les commentaires associés au post
        $queryComment = $this->connection->getPdo()->prepare('DELETE FROM commentaire WHERE idpost = :idpost');
        $queryComment->execute([
            "idpost" => $idpost
        ]);

        // Delete associated likes for the post
        $queryLikes = $this->connection->getPdo()->prepare('DELETE FROM `file` WHERE idpost = :idpost');
        $queryLikes->execute([
            "idpost" => $idpost
        ]);

        // Delete associated likes for the post
        $queryLikes = $this->connection->getPdo()->prepare('DELETE FROM `like` WHERE idpost = :idpost');
        $queryLikes->execute([
            "idpost" => $idpost
        ]);

        // Delete the post
        $queryPost = $this->connection->getPdo()->prepare('DELETE FROM post WHERE idpost = :idpost');
        $queryPost->execute([
            "idpost" => $idpost
        ]);

        $id_profil = $_SESSION['id_profil'];

        $query = $this->connection->getPdo()->prepare("INSERT INTO `log` (`action`, id_profil) VALUES('a supprimer un post', :id_profil)");
        $query->execute([
            'id_profil' => $id_profil
        ]);
        return "Bien enregistré";
    }


    public function changeAccount($user)
    {
        $hashedPassword = password_hash($user['mdp_profil'], PASSWORD_DEFAULT);
        $nomProfil = $user['nom_profil'];
        $email_profil = $user['email_profil'];

        try {
            $query = $this->connection->getPdo()->prepare('UPDATE profil SET nom_profil = :nom_profil, mdp_profil = :mdp_profil, email_profil = :email_profil WHERE id_profil = :id_profil');
            $query->execute([
                'id_profil' => $user['id_profil'],
                'nom_profil' => $nomProfil,
                'mdp_profil' => $hashedPassword,
                'email_profil' => $email_profil
            ]);

            $id_profil = $_SESSION['id_profil'];

            $query = $this->connection->getPdo()->prepare("INSERT INTO `log` (`action`, id_profil) VALUES('a modifié son profil', :id_profil)");
            $query->execute([
                'id_profil' => $id_profil
            ]);
            return "Bien enregistré";

            return "Bien enregistré";
        } catch (\PDOException $e) {
            return "une erreur est survenue";
        }
    }

    public function deconnexion()
    {
        $id_profil = $_SESSION['id_profil'];

        $query = $this->connection->getPdo()->prepare("INSERT INTO `log` (`action`, id_profil) VALUES(:action, :id_profil)");
        $query->execute([
            'action' => "s'est déconnecté",
            'id_profil' => $id_profil
        ]);
        return "Bien enregistré";
    }

    public function allPostByProfil()
    {
        $id_profil = $_SESSION['id_profil'];

        $query = $this->connection->getPdo()->prepare('SELECT post.idpost, post.description_post FROM post INNER JOIN profil ON post.id_profil = profil.id_profil WHERE profil.id_profil = :id_profil order by post.idpost DESC');
        $query->execute([
            'id_profil' => $id_profil
        ]);

        return $query->fetchAll(PDO::FETCH_CLASS, "App\Models\Profil");
    }

    public function allInfoByCompte()
    {
        $id_profil = $_SESSION['id_profil'];
        $query = $this->connection->getPdo()->prepare('SELECT id_profil, nom_profil, email_profil FROM profil WHERE id_profil = :id_profil');

        $query->execute([
            'id_profil' => $id_profil
        ]);
        return $query->fetchAll(PDO::FETCH_CLASS, "App\Models\Profil");
    }

    public function deleteProfilById($user)
    {

        $id_profil =  $_SESSION['id_profil'];

        // Delete associated rows in the "like" table
        $queryLike = $this->connection->getPdo()->prepare("DELETE FROM `like` WHERE id_profil = :id_profil");
        $queryLike->execute(['id_profil' => $id_profil]);

        $queryLog = $this->connection->getPdo()->prepare("DELETE FROM `log` WHERE id_profil = :id_profil");
        $queryLog->execute(['id_profil' => $id_profil]);

        $queryComment = $this->connection->getPdo()->prepare("DELETE FROM `commentaire` WHERE id_profil = :id_profil");
        $queryComment->execute(['id_profil' => $id_profil]);


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

        $query = $this->connection->getPdo()->prepare("INSERT INTO `log` (`action`, id_profil) VALUES('a commenté un post', :id_profil)");
        $query->execute([
            'id_profil' => $id_profil
        ]);
        return "Bien enregistré";
    }

    public function getCommentaires()
    {
        $query = $this->connection->getPdo()->prepare('SELECT commentaire, date_commentaire, commentaire.idpost, profil.nom_profil, date_commentaire from commentaire inner join post on post.idpost= commentaire.idpost INNER JOIN profil ON profil.id_profil = commentaire.id_profil');
        $query->execute();
        return $query->fetchAll(PDO::FETCH_CLASS, "App\Models\Commentaire");
    }



    public function getAllUsers()
    {
        $query = $this->connection->getPdo()->prepare("SELECT nom_profil, description_post, date_post, email_profil from profil inner join post on profil.id_profil = post.id_profil  order by post.idpost DESC");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_CLASS, "App\Models\Profil");
    }

    public function getAllProfil()
    {
        $query = $this->connection->getPdo()->prepare("SELECT profil.nom_profil, profil.id_profil, profil.email_profil, role.libelle_role, profil.id_role
        FROM profil
        INNER JOIN post
        inner join role on role.id_role = profil.id_role
        GROUP BY profil.nom_profil, profil.id_profil
        LIMIT 20");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_CLASS, "App\Models\Profil");
    }

    public function ajouterUnModo($role)
    {

        $id_profil = $_SESSION['id_profil'];

        $nom_profil = $role['nom_profil'];

        $action = "a promu $nom_profil au rang de modérateur";

        $query = $this->connection->getPdo()->prepare("INSERT INTO `log` (`action`, id_profil) VALUES(:action, :id_profil)");

        $query->execute([
            'action' => $action,
            'id_profil' => $id_profil
        ]);

        $id_profil = $role['id_profil'];

        $query = $this->connection->getPdo()->prepare('UPDATE profil SET id_role = 2 WHERE id_profil = :id_profil');
        $query->execute([
            'id_profil' => $id_profil
        ]);
    }


    public function retrograderModo($role)
    {

        $id_profil = $_SESSION['id_profil'];

        $nom_profil = $role['nom_profil'];

        $action = "a rétrogradé $nom_profil au rang de modérateur";

        $query = $this->connection->getPdo()->prepare("INSERT INTO `log` (`action`, id_profil) VALUES(:action, :id_profil)");
        $query->execute([
            'action' => $action,
            'id_profil' => $id_profil
        ]);

        $id_profil = $role['id_profil'];

        $query = $this->connection->getPdo()->prepare('UPDATE profil set id_role = 1 WHERE id_profil = :id_profil');
        $query->execute([
            'id_profil' => $id_profil
        ]);
    }

    // Like

    public function addlike($like)
    {
        $idpost = $like['idpost'];
        $id_profil = $like['id_profil'];

        // Vérifier si l'utilisateur a déjà effectué un like sur ce post
        if (!$this->hasLikedPost($like)) {
            $query = $this->connection->getPdo()->prepare('INSERT INTO `like` (id_profil, idpost) VALUES(:id_profil, :idpost)');
            $query->execute([
                "id_profil" => $id_profil,
                'idpost' => $idpost,
            ]);
        }
    }


    public function LikeByPost($like)
    {
        $idpost = $like['idpost'];
        $query = $this->connection->getPdo()->prepare("SELECT COUNT(id_like) as like_count FROM `like` WHERE idpost = :idpost");
        $query->execute([':idpost' => $idpost]);
        $result = $query->fetch(PDO::FETCH_ASSOC);
        return $result['like_count'];
    }

    public function hasLikedPost($like)
    {
        $idpost = $like['idpost'];
        $id_profil = $like['id_profil'];

        $query = $this->connection->getPdo()->prepare('SELECT COUNT(id_like) as like_count FROM `like` WHERE id_profil = :id_profil AND idpost = :idpost');
        $query->execute([
            "id_profil" => $id_profil,
            'idpost' => $idpost,
        ]);
        $result = $query->fetch(PDO::FETCH_ASSOC);
        return $result['like_count'] > 0;
    }

    public function deleteProfilWithAdmin($delete)
    {
        $id_profil = $delete['id_profil'];

        $queryLike = $this->connection->getPdo()->prepare("DELETE FROM `like` WHERE id_profil = :id_profil");
        $queryLike->execute(['id_profil' => $id_profil]);

        $queryComment = $this->connection->getPdo()->prepare("DELETE FROM `commentaire` WHERE id_profil = :id_profil");
        $queryComment->execute(['id_profil' => $id_profil]);

        $queryLog = $this->connection->getPdo()->prepare("DELETE FROM `log` WHERE id_profil = :id_profil");
        $queryLog->execute(['id_profil' => $id_profil]);

        $queryProfil = $this->connection->getPdo()->prepare("DELETE FROM profil WHERE id_profil = :id_profil");
        $queryProfil->execute(['id_profil' => $id_profil]);
    }
    public function getAllLog()
    {
        $query = $this->connection->getPdo()->prepare("SELECT action, log.id_profil, profil.nom_profil from log inner join profil on profil.id_profil = log.id_profil order by log.id_log DESC LIMIT 20");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_CLASS, "App\Models\Profil");
    }
}
