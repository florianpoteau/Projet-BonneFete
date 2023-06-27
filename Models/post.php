<?php

namespace App\Models;


class Post
{
    private $id;
    private $description;

    public function __construct()
    {
    }

    public function getId()
    {
        return $this->id;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }
}
