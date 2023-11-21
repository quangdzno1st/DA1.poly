<?php


class Model
{
    protected $db = [];

    public
    function __construct()
    {
        $conn = 'mysql:dbname=da1; host=localhost';
        $user = 'root';
        $password = 'quangdzno1st';
        $this->db = new Database($conn, $user, $password);
    }
}

?>