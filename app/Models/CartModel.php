<?php


class CartModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getAllUser()
    {
        $sql = "SELECT * FROM khachhang";
        return $this->db->select($sql);
    }

    public function getIdphongBook()
    {
        $sql = "SELECT id_phong FROM datphong";
        return $this->db->select($sql);
    }
    public function checkIdKH($id_khachhang)
    {
        $sql = "SELECT id_datphong,id_khachhang FROM datphong where id_khachhang = $id_khachhang";
        return $this->db->select($sql);
    }

    public function getAllBook()
    {
        $sql = "SELECT * FROM datphong";
        return $this->db->select($sql);
    }

    public function getAllBookById($id_datphong)
    {
        $sql = "SELECT datphong.*, 
                    LENGTH(datphong.id_phong) - LENGTH(REPLACE(datphong.id_phong, ',', '')) + 1 AS count_id_phong,
                    phong.*,
                    loaiphong.*,
                    khachhang.*,
                    GROUP_CONCAT(noithat.ten_noithat) as noithat
                FROM datphong
                JOIN phong ON datphong.id_phong = phong.id_phong
                JOIN loaiphong ON loaiphong.id_loaiphong = phong.loai_phong_id
                INNER join 
                        noithat_loaiiphong on noithat_loaiiphong.id_loaiphong = loaiphong.id_loaiphong
                INNER join 
                        noithat on noithat.id = noithat_loaiiphong.id_noithat 
                JOIN khachhang ON khachhang.id_khachhang = datphong.id_khachhang
                WHERE datphong.id_datphong = $id_datphong";
        return $this->db->select($sql);
    }

    public function getLoaiphongBook($id_khachhang)
    {
        $sql = "SELECT datphong.*, 
                    LENGTH(datphong.id_phong) - LENGTH(REPLACE(datphong.id_phong, ',', '')) + 1 AS count_id_phong,
                    phong.*,
                    loaiphong.*,
                    khachhang.*
                FROM datphong
                JOIN phong ON datphong.id_phong = phong.id_phong
                JOIN loaiphong ON loaiphong.id_loaiphong = phong.loai_phong_id
                JOIN khachhang ON khachhang.id_khachhang = datphong.id_khachhang
                WHERE datphong.id_khachhang = $id_khachhang;
                ";
        return $this->db->select($sql);
    }

    public function insertVnpay($data)
    {
        return $this->db->insert("vnpay", $data);
    }

    public function insertBook($data)
    {
        return $this->db->insert("datphong", $data);
    }

    public function deletePhong($id)
    {
        $sql = "DELETE FROM phong WHERE id_phong in = ($id)";
        echo $sql;
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
    }

    public function deleteALL($id)
    {
        $sql = "DELETE FROM images WHERE id_phong = $id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
    }

    public function getImageByRoomId($id)
    {
        $sql = "SELECT * FROM images WHERE id_phong = $id";
        return $this->db->select($sql);
    }

    public function deleteById($id)
    {
        $idDelete = "id = $id";
        return $this->db->delete("images", $idDelete);
    }
}

?>