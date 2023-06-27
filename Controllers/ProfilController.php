<?php

namespace App\Controllers;

require_once 'Models/ProfilModel.php';

use App\Models\ProfilModel;

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
        require_once 'Views/inscriptions/inscription.php';
    }

    public function postRegister()
    {
        $user = $_POST;
        $message = $this->profilModel->createUser($user);
        echo $message;
    }
}
