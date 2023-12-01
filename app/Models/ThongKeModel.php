<?php


class ThongKeModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function thongKeThang($dateSearch)
    {

        $sql = " SELECT 
			        COUNT(DISTINCT datphong.id_datphong) as luot_dat,
                    SUM(datphong.tong_tien) tong_tien,
                    GROUP_CONCAT(datphong.id_phong) AS danh_sach_id_phong,
                    loaiphong.ten
                FROM 
                    datphong
                 JOIN
                		loaiphong on loaiphong.id_loaiphong = datphong.id_loaiphong
                WHERE 
                    (datphong.ngay_dat_phong between '"  . $dateSearch['ngay_bat_dau']."' AND '".  $dateSearch['ngay_ket_thuc']."' )
                AND 
                    datphong.trang_thai = 'Đã thanh toán'
                GROUP BY
            		loaiphong.id_loaiphong
                    ";
//    echo $sql;
//    die();
        return $this->db->select($sql);
    }
    public function getTotalPrice($dateSearch){

        $sql = " SELECT 
                    SUM(datphong.tong_tien) as tong_tien,
                    count(*) as luot_dat
                FROM 
                    datphong
                WHERE 
                    (datphong.ngay_dat_phong between '"  .$dateSearch['ngay_bat_dau']."' AND '".  $dateSearch['ngay_ket_thuc']."')
                AND 
                    datphong.trang_thai = 'Đã thanh toán'
                    ";
        return $this->db->select($sql);

    }

}

?>