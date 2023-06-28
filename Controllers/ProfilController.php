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
        header('Location: ../profil/index');
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
}
