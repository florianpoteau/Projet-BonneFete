<?php

namespace App\Models;


class Log
{
    private $id_log;
    private $action;
    private $date_action;

    public function __construct()
    {
    }

    public function getIdLog()
    {
        return $this->id_log;
    }

    public function getDateLog()
    {
        return $this->date_action;
    }
    public function getAction()
    {
        return $this->action;
    }

    public function setIdLog($id_log)
    {
        $this->id_log = $id_log;
    }

    public function setDateLike($date_action)
    {
        $this->date_action = $date_action;
    }
    public function setAction($action)
    {
        $this->action = $action;
    }
}
