<?php


class AccountModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getById($id_khachhang)
    {
        $sql = "SELECT * FROM khachhang WHERE id_khachhang = :id_khachhang";
        $data = [
            "id_khachhang" => $id_khachhang,
        ];
        return $this->db->selectById($sql, $data);
    }

    public function getAllEmailsExceptId($id_khachhang, $email)
    {
        $sql = "SELECT * FROM khachhang WHERE email like :email  and id_khachhang <> $id_khachhang";
        $data = [
            'email' => $email
        ];
        return $this->db->selectById($sql,$data);
    }

    public function check_Mail($email)
    {
        $data = [
            'email' => $email
        ];
        $sql = "SELECT * FROM khachhang WHERE email like :email ";

        return $this->db->selectById($sql, $data);
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

    public function updateAccount($id_khachhang, $data)
    {
        $this->db->update("khachhang", $data, ' id_khachhang =' . $id_khachhang);
    }

    public function updatePass($id_khachhang, $data)
    {
        $this->db->update("khachhang", $data, " id_khachhang = $id_khachhang");
    }

    public function handleRequestLogin($data)
    {
        $sql = "SELECT * FROM khachhang WHERE user = ? and pass = ?";
        return $this->db->selectUser($sql, $data['user'], $data['pass']);
    }
}

?>