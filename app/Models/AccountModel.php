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
        return $this->db->selectById($sql, $data);
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
        $sql = "SELECT * FROM khachhang WHERE user = ? and pass = ? ";

        return $this->db->selectUser($sql, $data['user'], $data['pass']);
    }

    public function getAllAccounts()
    {
        $sql = "SELECT * FROM khachhang";
        return $this->db->select($sql);
    }

    public function deleteAccount($id)
    {
        $id_delete = ' id_khachhang = ' . $id;
        $this->db->delete('dathang', $id_delete);
        return $this->db->delete("khachhang", $id_delete);
    }

    public function banAccount($id)
    {
        $account = $this->getById($id);
        $data = [
            'ban' => $account[0]['ban'] == 0 ? '1' : 0
        ];

        $id_update = ' id_khachhang = ' . $id;
        return $this->db->update("khachhang", $data, $id_update);
    }

    public function getAccountByEmailAndNotId($id, $email)
    {
        $data = [
            'email' => $email,
            'id_khachhang' => $id
        ];
        $sql = "SELECT * FROM khachhang WHERE email like :email and id_khachhang <> :id_khachhang ";

        return $this->db->selectById($sql, $data);
    }

    public function countAccount()
    {
        $sql = "SELECT count(*) as countAccount FROM khachhang";
        return $this->db->select($sql);
    }

    public function countAccountBan()
    {
        $sql = "SELECT count(*) as countAccountBan FROM khachhang WHERE ban = 1";
        return $this->db->select($sql);
    }
}

?>