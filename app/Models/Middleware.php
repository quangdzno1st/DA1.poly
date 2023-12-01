<?php


class Middleware extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function checkRole()
    {
        Session::init();
        if (!isset($_SESSION) || !$_SESSION['dataUser']['role'] == 1) {
            header('Location: ' . BASE_URL . 'HomeController');
        }
    }

}

?>