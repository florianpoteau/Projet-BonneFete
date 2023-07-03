<?php

namespace App\Models;


class Like
{
    private $id_like;
    private $date_like;

    public function __construct()
    {
    }

    public function getIdLike()
    {
        return $this->id_like;
    }

    public function getDateLike()
    {
        return $this->date_like;
    }

    public function setIdLike($id_like)
    {
        $this->id_like = $id_like;
    }

    public function setDateLike($date_like)
    {
        $this->date_like = $date_like;
    }
}
