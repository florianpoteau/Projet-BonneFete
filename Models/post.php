<?php

namespace App\Models;


class Post
{
    private $idpost;
    private $description_post;

    public function __construct()
    {
    }

    public function getId()
    {
        return $this->idpost;
    }

    public function getDescription()
    {
        return $this->description_post;
    }

    public function setId($idpost)
    {
        $this->idpost = $idpost;
    }

    public function setDescription($description_post)
    {
        $this->description_post = $description_post;
    }
}
