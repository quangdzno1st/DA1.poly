<?php

class Load
{

    public function __construct()
    {

    }

    public function view($data = null, $fileName = 'home')
    {
        require_once 'app/Views/' . $fileName . '.php';
    }

    public function model($modelName = 'homeModel')
    {
        require_once 'app/Models/' . $modelName . '.php';
        return new $modelName();
    }

    public function controller($controller = 'homeController')
    {
        require_once 'app/Controllers/' . $controller . '.php';
        return new $controller();
    }
}

?>