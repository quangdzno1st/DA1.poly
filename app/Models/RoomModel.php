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

    public function getById($id)
    {
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

    public function selectLatest()
    {
        return $this->db->selectLatest("phong", "id_phong");
    }

    public function searchRoom($data)
    {
        $sql = "SELECT  
                    loaiphong.ten,
                    loaiphong.suc_chua,
                    loaiphong.gia,
                    loaiphong.id_loaiphong,
                     GROUP_CONCAT(noithat.ten_noithat) as noithat,
                     count( DISTINCT phong.id_phong) as so_luong,
                    GROUP_CONCAT(images.path) as images  
                FROM 
                    phong 
                INNER JOIN  
                    loaiphong on loaiphong.id_loaiphong = phong.loai_phong_id
                INNER join 
                        noithat_loaiiphong on noithat_loaiiphong.id_loaiphong = loaiphong.id_loaiphong
                INNER join 
                        noithat on noithat.id = noithat_loaiiphong.id_noithat 
                INNER join 
                        images on images.id_loaiphong = loaiphong.id_loaiphong
                where ";

        if ($data['suc_chua'] != null) {
            $sql .= " loaiphong.suc_chua = :suc_chua
                and  ";
        }

        if ($data['id_loaiphong'] != null) {
            $sql .= " loaiphong.id_loaiphong = :id_loaiphong 
                   and ";
        }

        $sql .= "phong.id_phong not in
                    (
                SELECT 
                    id_phong FROM datphong 
                WHERE 
                    (:ngay_dat_phong between ngay_dat_phong and ngay_tra_phong)
                    or
                    (:ngay_tra_phong between ngay_dat_phong and ngay_tra_phong)
                    or
                    (:ngay_dat_phong <  ngay_dat_phong AND :ngay_tra_phong > ngay_tra_phong) 
                )
                group by 
                    loaiphong.id_loaiphong, loaiphong.ten;
                       
                          
";
        return $this->db->selectById($sql, $data);
    }



    public function searchRoom1($data,$id_loaiphong,$limit)
    {
        $sql = "SELECT phong.id_phong FROM phong
                INNER JOIN loaiphong
                on loaiphong.id_loaiphong = phong.loai_phong_id
                where loaiphong.id_loaiphong = $id_loaiphong
                and phong.id_phong not in 
                    ( SELECT id_phong FROM datphong
                        WHERE (:ngay_dat_phong between ngay_dat_phong and ngay_tra_phong)
                        or (:ngay_tra_phong between ngay_dat_phong and ngay_tra_phong) 
                        or (:ngay_dat_phong <  ngay_dat_phong AND :ngay_tra_phong > ngay_tra_phong)
                    )
                group by
                    loaiphong.id_loaiphong, loaiphong.ten,phong.id_phong
                    limit $limit";
        return $this->db->selectById($sql, $data);
    }

    public function getRoomAll($id_loaiphong)
    {
        $sql = "SELECT  
                    loaiphong.ten,
                    loaiphong.suc_chua,
                    loaiphong.gia,
                    loaiphong.id_loaiphong,
                     GROUP_CONCAT(noithat.ten_noithat) as noithat,
                     count( DISTINCT phong.id_phong) as so_luong,
                    GROUP_CONCAT(images.path) as images  
                FROM 
                    phong 
                INNER JOIN  
                    loaiphong on loaiphong.id_loaiphong = phong.loai_phong_id
                INNER join 
                        noithat_loaiiphong on noithat_loaiiphong.id_loaiphong = loaiphong.id_loaiphong
                INNER join 
                        noithat on noithat.id = noithat_loaiiphong.id_noithat 
                INNER join 
                        images on images.id_loaiphong = loaiphong.id_loaiphong
                where loaiphong.id_loaiphong = $id_loaiphong";
        return $this->db->select($sql);
    }
}

?>