<?php


class Model
{
    protected $db = [];

    public
    function __construct()
    {
        $conn = 'mysql:dbname=da1; host=localhost';
        $user = 'root';
        $password = '';
        $this->db = new Database($conn, $user, $password);
    }
}

?>