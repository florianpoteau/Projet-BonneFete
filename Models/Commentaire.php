<?php

namespace App\Models;


class Commentaire
{
    private $idpost;
    private $id_profil;
    private $id_commentaire;
    private $commentaire;
    private $date_commentaire;

    public function __construct()
    {
    }

    public function getIdPost()
    {
        return $this->idpost;
    }

    public function getIdProfil()
    {
        return $this->id_profil;
    }

    public function setIdPost($idpost)
    {
        $this->idpost = $idpost;
    }

    public function setIdProfil($id_profil)
    {
        $this->id_profil = $id_profil;
    }

    public function getIdCommentaire()
    {
        return $this->id_commentaire;
    }

    public function getCommentaire()
    {
        return $this->commentaire;
    }

    public function getDateCommentaire()
    {
        return $this->date_commentaire;
    }

    public function setIdCommentaire($id_commentaire)
    {
        $this->id_commentaire = $id_commentaire;
    }

    public function setDescription($commentaire)
    {
        $this->commentaire = $commentaire;
    }

    public function setDatePost($date_commentaire)
    {
        $this->date_commentaire = $date_commentaire;
    }
}
