<?php

namespace App\Models;


class Post
{
    private $id_role;
    private $libelle_role;

    public function __construct()
    {
    }

    public function getIdRole()
    {
        return $this->id_role;
    }

    public function getLibelle()
    {
        return $this->libelle_role;
    }


    public function setIdRole($id_role)
    {
        $this->id_role = $id_role;
    }

    public function setDescription($libelle_role)
    {
        $this->libelle_role = $libelle_role;
    }
}
