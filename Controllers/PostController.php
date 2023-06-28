<?php

namespace App\Controllers;

require_once 'Models/PostModel.php';

use App\Models\PostModel;

class PostController
{
    protected $postModel;

    public function __construct()
    {
        $this->postModel = new PostModel();
    }

    public function getAccueil()
    {
        if (isset($_SESSION['nom_profil'])) {
            // Un utilisateur est déjà connecté, redirigez vers une autre page
            header('Location: ../Views/accueil');
            exit();
        }
    }
}
