<?php


class RoomModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getAllRoomById($id)
    {
        $sql = "SELECT
                    phong.id_phong,
                    phong.ten_phong,
                    loaiphong.ten AS loaiphong,
                    loaiphong.suc_chua,
                    loaiphong.gia,
                    phong.mo_ta,
                    phong.trang_thai
                FROM
                    phong
                JOIN
                    loaiphong ON phong.loai_phong_id = loaiphong.id_loaiphong
                where phong.id_phong = $id
                ";
        return $this->db->select($sql);
    }
    public function getAllRoomImgById($id)
    {
        $sql = "SELECT
                    phong.id_phong,
                    phong.ten_phong,
                    phong.mo_ta,
                    phong.trang_thai,
                    images.path
                FROM
                    phong
                JOIN
                images ON phong.id_phong = images.id_phong
                where images.id_phong = $id
                ";
        return $this->db->select($sql);
    }
    public function roomOther($id)
    {
        $sql = "SELECT
                    phong.id_phong,
                    phong.ten_phong,
                    loaiphong.ten AS loaiphong,
                    loaiphong.suc_chua,
                    loaiphong.gia,
                    phong.mo_ta,
                    phong.trang_thai
                FROM
                    phong
                JOIN
                    loaiphong ON phong.loai_phong_id = loaiphong.id_loaiphong
                WHERE
                phong.id_phong != $id
                LIMIT 4
                ";
        return $this->db->select($sql);
    }

    public function getAllRoomLimit()
    {
        $sql = "SELECT
                    phong.id_phong,
                    phong.ten_phong,
                    loaiphong.ten AS loaiphong,
                    loaiphong.suc_chua,
                    loaiphong.gia,
                    phong.mo_ta,
                    phong.trang_thai
                    
                FROM
                    phong
                JOIN
                    loaiphong ON phong.loai_phong_id = loaiphong.id_loaiphong
                limit 6 
                ";
        return $this->db->select($sql);
    }
    public function getAllRoom()
    {
        $sql = "SELECT * FROM phong p inner join loaiphong l on p.loai_phong_id = l.id_loaiphong ";
        return $this->db->select($sql);
    }

    public function getById($id){
        $sql = "SELECT * FROM phong WHERE id_phong = :id";
        $data = [
            "id" => $id,
        ];
        return $this->db->selectById($sql, $data);
    }

    public function update($data, $id)
    {
        $idUpdate = " id_phong = " . $id;
        return $this->db->update("phong", $data, $idUpdate);
    }

    public function delete($id)
    {
        $idDelete = "id_phong = " . $id;
        return $this->db->delete("phong", $idDelete);
    }

    public function insert($data)
    {
        return $this->db->insert("phong", $data);
    }

    public function selectLatest() {
        return $this->db->selectLatest("phong", "id_phong");
    }
}

?>