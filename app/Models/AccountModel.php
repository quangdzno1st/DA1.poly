<?php


class AccountModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getAccountByEmail($email)
    {
        $data = [
            'email' => $email
        ];
        $sql = "SELECT * FROM khachhang WHERE email like :email ";

        return $this->db->selectById($sql, $data);
    }

    public function insertAccount($data)
    {
        $this->db->insert("khachhang", $data);
    }

    public function handleRequestLogin($data)
    {
        $sql = "SELECT * FROM khachhang WHERE user = ? and pass = ?" ;
        return $this->db->selectUser($sql, $data['user'],$data['pass']);
    }
}

?>