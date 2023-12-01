<?php


class OrderModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getAllOrder()
    {
        $sql = "SELECT
                    datphong.*,
                    khachhang.user,
                     GROUP_CONCAT(phong.ten_phong) as ten_phong
                FROM 
                    datphong 
                INNER JOIN 
                    khachhang on khachhang.id_khachhang = datphong.id_khachhang
                INNER JOIN 
                    phong ON FIND_IN_SET(phong.id_phong, datphong.id_phong)
                 GROUP BY 
                    datphong.id_datphong
                    ";

        return $this->db->select($sql);
    }

    public function approveOrder($id)
    {
        $id_update = " id_datphong = " . $id;
        $data = [
            'approve' => 1
        ];
        return $this->db->update("datphong", $data, $id_update);
    }

    public function huyOder($id)
    {
        $id_update = " id_datphong = " . $id;
        $data = [
            'trang_thai_huy' => "Đã hủy"
        ];
        return $this->db->update("datphong", $data, $id_update);
    }

    public function checkinOrder($id)
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $id_update = " id_datphong = " . $id;
        $data = [
            'time_check_in' => date('Y-m-d H:i:s')
        ];
        return $this->db->update("datphong", $data, $id_update);
    }

    public function checkoutOrder($id)
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $id_update = " id_datphong = " . $id;
        $data = [
            'time_check_out' => date('Y-m-d H:i:s')
        ];
        return $this->db->update("datphong", $data, $id_update);
    }



    public function getOrderById($id)
    {
        $sql = "SELECT
                    datphong.id_datphong,
                    datphong.ngay_dat_phong,
                    datphong.ngay_tra_phong,
                    datphong.tong_tien,
                    datphong.trang_thai,
                    datphong.time_check_in,
                    datphong.time_check_out,
                    datphong.so_tien_coc,
                    datphong.hinhthucthanhtoan,
                    datphong.approve,
                    khachhang.user,
                    khachhang.id_khachhang,
                     GROUP_CONCAT(phong.ten_phong) as ten_phong
                FROM 
                    datphong 
                INNER JOIN 
                    khachhang on khachhang.id_khachhang = datphong.id_khachhang
                INNER JOIN 
                    phong ON FIND_IN_SET(phong.id_phong, datphong.id_phong)
                WHERE 
                    datphong.id_datphong = :id_datphong
                 GROUP BY 
                    datphong.id_datphong
                    ";
        $data = [
            'id_datphong' => $id
        ];

        return $this->db->selectById($sql,$data);
    }

    public function updateOrder($id,$data){
        $id_update = " id_datphong = " . $id;
        return $this->db->update("datphong", $data, $id_update);
    }

}

?>