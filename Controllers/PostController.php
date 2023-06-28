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

    public function postAccueil()
    {

        // Un utilisateur est déjà connecté, redirigez vers une autre page
        require_once 'Views/post/accueil.php';
    }
}
