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
        $this->profilModel->createUser($user);
        header('Location: ../profil/login');
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
}
