<?php

namespace App\Controllers;

require_once 'Models/PostModel.php';

use App\Models\PostModel;

class PostController
{
    protected $postModel;
    protected $profilModel;

    public function __construct()
    {
        $this->postModel = new PostModel();
    }

    public function getIndex()
    {
        $posts = $this->postModel->getAll();
        require_once 'Views/post/connexion.php';
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
        header('Location: ../post/index');
    }
}
