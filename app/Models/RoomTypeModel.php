<?php


class RoomTypeModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getAllLoai()
    {
        $sql = "SELECT 
                    loaiphong.id_loaiphong,
                    loaiphong.ten,
                    loaiphong.suc_chua,
                    loaiphong.gia,
                     GROUP_CONCAT(noithat.ten_noithat) as noithat,
                    GROUP_CONCAT(images.path) as images  
                FROM 
                    loaiphong 
                INNER JOIN 
                    noithat_loaiiphong on noithat_loaiiphong.id_loaiphong = loaiphong.id_loaiphong
                INNER JOIN 
                    noithat on noithat.id = noithat_loaiiphong.id_noithat
                INNER JOIN  
                    images ON images.id_loaiphong = loaiphong.id_loaiphong
                GROUP BY 
                    loaiphong.id_loaiphong
                    ";
        return $this->db->select($sql);
    }

    public function getRoomTypeByName($name, $id = "")
    {
        $sql = "SELECT * FROM loaiphong WHERE ten = '$name'";
        if (!empty($id)) {
            $sql .= " AND loaiphong.id_loaiphong <> '$id'";
        }
        return $this->db->select($sql);
    }

    public function selectLatest()
    {
        return $this->db->selectLatest("loaiphong", "id_loaiphong");
    }

    public function getById($id)
    {
        $sql = "SELECT 
                    loaiphong.id_loaiphong,
                    loaiphong.ten,
                    loaiphong.suc_chua,
                    loaiphong.gia,
                      GROUP_CONCAT(noithat_loaiiphong.id_noithat) as id_noithat  
                FROM 
                    loaiphong 
                INNER JOIN 
                        noithat_loaiiphong on loaiphong.id_loaiphong = noithat_loaiiphong.id_loaiphong
                 WHERE 
                   loaiphong.id_loaiphong = :id_loaiphong
                    ";
        $data = [
            "id_loaiphong" => $id,
        ];
        return $this->db->selectById($sql, $data);
    }

    public function update($data, $id)
    {
        $idUpdate = " id_loaiphong = " . $id;
        return $this->db->update("loaiphong", $data, $idUpdate);
    }

    public function delete($id)
    {
        $idDelete = "id_loaiphong = " . $id;
        $idDeleteRoom = "loai_phong_id = " . $id;
        $this->db->delete('images', $idDelete, 999);
        $this->db->delete('phong', $idDeleteRoom, 999);
        $this->db->delete("noithat_loaiiphong", $idDelete, 999);
        return $this->db->delete("loaiphong", $idDelete, 999);
    }

    public function insert($data)
    {
        return $this->db->insert("loaiphong", $data);
    }

}

?>