<?php

namespace App\Controllers;

require_once 'Models/ProfilModel.php';

use App\Models\ProfilModel;
use App\Models\Profil;

class ProfilController
{
    protected $profilModel;

    public function __construct()
    {
        $this->profilModel = new ProfilModel();
    }

    public function getIndex()
    {
        $profils = $this->profilModel->getAll();
        require_once 'Views/post/inscription.php';
    }

    public function postRegister()
    {
        $user = $_POST;
        $email = $user['email_profil'];
        $existingUser = $this->profilModel->getUserByUsername($user['nom_profil']);
        $existingEmail = $this->profilModel->getEmail($user['email_profil']);

        if (!$this->emailExists($email)) {
            echo "L'adresse e-mail n'existe pas";
            return;
        } elseif ($existingUser) {
            echo "Nom d'utilisateur déjà utilisé";
            return;
        } elseif ($existingEmail) {
            echo 'Adresse email déja utilisé';
            return;
        } else {
            $this->profilModel->createUser($user);
            header('Location: ../profil/login');
        }
    }

    // Fonction permettant de savoir si l'email existe déja ou pas
    private function emailExists($email)
    {
        // Obtenez le domaine de l'adresse e-mail
        $domain = explode('@', $email)[1];

        // Vérifiez si le domaine a un enregistrement MX
        return checkdnsrr($domain, 'MX');
    }



    public function getLogin()
    {

        require_once 'Views/post/connexion.php';
    }



    public function postLogin()
    {
        $user = $_POST;
        $this->profilModel->login($user);
    }

    public function getAccueil()
    {
        $profils = $this->profilModel->getAll();
        $commentaires = $this->profilModel->getCommentaires();

        require_once 'Views/post/accueil.php';
    }

    public function postAccueil()
    {
        $user = $_POST;
        $this->profilModel->addPost($user);
    }

    public function getProfil()
    {
        $postUsers = $this->profilModel->allPostByProfil();
        require_once 'Views/post/profil.php';
    }

    public function postChange()
    {
        $user = $_POST;
        $this->profilModel->change($user);

        // Condition pour vérifier la page actuelle et choisir le header en conséquence
        $referer = strtolower($_SERVER['HTTP_REFERER']);
        $accueilURL = strtolower('http://localhost/Projet-BonneFete/profil/accueil');
        if ($referer == $accueilURL) {
            header('Location: ../profil/accueil');
        } else {
            header('Location: ../profil/profil');
        }
    }

    public function postDelete()
    {

        $post = $_POST;
        $this->profilModel->delete($post);

        header('Location: ../profil/accueil');
    }

    public function postChangePassword()
    {
        $user = $_POST;
        $this->profilModel->changePassword($user);
        header('Location: ../profil/profil');
    }

    public function postDeleteProfil()
    {
        $user = $_POST;
        $this->profilModel->deleteProfilById($user);
        header('Location: ../profil/index');
    }

    public function postCommentaire()
    {
        $user = $_POST;
        $idpost = $user['idpost'];
        $this->profilModel->addComments($user, $idpost);
        header('Location: ../profil/accueil');
    }
}
