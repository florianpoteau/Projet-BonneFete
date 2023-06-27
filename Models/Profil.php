<?php

namespace App\Models;


class Profil
{
    private $id_profil;
    private $email_profil;
    private $mdp_profil;
    private $nom_profil;
    private $id_role;

    public function __construct()
    {
    }

    public function getId()
    {
        return $this->id_profil;
    }

    public function getEmail()
    {
        return $this->email_profil;
    }

    public function getPassword()
    {
        return $this->mdp_profil;
    }

    public function getNomProfil()
    {
        return $this->nom_profil;
    }
    public function getRole()
    {
        return $this->id_role;
    }

    public function setId($id_profil)
    {
        $this->id_profil = $id_profil;
    }

    public function setEmail($email_profil)
    {
        $this->email_profil = $email_profil;
    }

    public function setPassword($mdp_profil)
    {
        $this->mdp_profil = $mdp_profil;
    }

    public function setNomProfil($nom_profil)
    {
        $this->nom_profil = $nom_profil;
    }
    public function setRole($id_role)
    {
        $this->id_role = $id_role;
    }
}
