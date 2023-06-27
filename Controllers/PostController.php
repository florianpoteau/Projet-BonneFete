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

    public function getInscription()
    {
        $posts = $this->postModel->getAll();
        require_once 'Views/post/index.php';
    }
}
