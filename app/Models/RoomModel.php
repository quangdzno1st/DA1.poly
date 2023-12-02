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

    public function getRoomByName($name, $id = "")
    {
        $sql = "SELECT * FROM phong WHERE ten_phong = '$name'";
        if (!empty($id)) {
            $sql .= " AND phong.id_phong <> '$id'";
        }
        return $this->db->select($sql);
    }

    public function getAllCmt($id_loaiphong)
    {
        $sql = "SELECT
                    binhluan.*,
                    khachhang.user
                FROM
                    binhluan
                JOIN khachhang ON binhluan.id_khachhang = khachhang.id_khachhang
                JOIN loaiphong ON binhluan.id_loaiphong = loaiphong.id_loaiphong
                where binhluan.id_loaiphong = $id_loaiphong
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

    public function selectAllCmt()
    {
        $sql = "SELECT
                    binhluan.*,
                    khachhang.user,
                    loaiphong.ten
                FROM
                    binhluan
                JOIN khachhang ON binhluan.id_khachhang = khachhang.id_khachhang
                JOIN loaiphong ON binhluan.id_loaiphong = loaiphong.id_loaiphong
                ";
        return $this->db->select($sql);
    }

    public function insertCmt($data)
    {
        return $this->db->insert("binhluan", $data);
    }


    public function deleteCmt($id)
    {
        $idDelete = "id = " . $id;
        return $this->db->delete("binhluan", $idDelete);
    }


    public function searchRoom($data)
    {
        $sql1 = "  SELECT 
                 GROUP_CONCAT(datphong.id_phong) as id_phong   from datphong
                WHERE
                (:ngay_dat_phong between ngay_dat_phong and ngay_tra_phong)
                    or
                    (:ngay_tra_phong between ngay_dat_phong and ngay_tra_phong)
                    or
                    (:ngay_dat_phong <  ngay_dat_phong AND :ngay_tra_phong > ngay_tra_phong) ";
        $result = $this->db->selectById($sql1, $data);
        $id_phong = $result[0]['id_phong'] != null ? $result[0]['id_phong'] : "0";
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
                    (" . $id_phong
            . "
                )
                group by 
                    loaiphong.id_loaiphong, loaiphong.ten;
                       
                          
";
        $dataSearchRoom = [];
        if ($data['suc_chua'] != null) {
            $dataSearchRoom["suc_chua"] = $data['suc_chua'];
        }
        if ($data['id_loaiphong'] != null) {
            $dataSearchRoom["id_loaiphong"] = $data['id_loaiphong'];
        }
//        echo "<pre>";
//        echo $sql;
//        die();
        return $this->db->selectById($sql, $dataSearchRoom);
    }


    public function searchRoom1($data, $id_loaiphong, $limit)
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

    public function countRoom()
    {
        $sql = "SELECT count(*) as countRoom FROM phong";
        return $this->db->select($sql);
    }

}

?>