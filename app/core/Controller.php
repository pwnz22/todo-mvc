<?php

class Controller
{
    public function model($model)
    {
        require_once '../app/models/' . $model . '.php';
        return new $model();
    }

    public function view($view, $data = [])
    {
        $msg = $this->msg();
        $auth = $this->auth();

        require_once '../app/views/' . $view . '.php';
    }

    public function msg()
    {
        if (!session_id()) session_start();
        return $msg = new \Plasticbrain\FlashMessages\FlashMessages();
    }

    public function auth()
    {
        $db = new \Delight\Db\PdoDsn('mysql:dbname=mvc;host=localhost;charset=utf8', 'root', '');
        return $auth = new \Delight\Auth\Auth($db);
    }

}