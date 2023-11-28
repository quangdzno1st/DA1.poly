<?php


class ThongKeModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function thongKeThang()
    {
        $firstDayOfMonth = date('Y-m-01');

        $lastDayOfMonth = date('Y-m-t');


        $sql = "SELECT 
                    *
                FROM 
                    datphong
                INNER JOIN 
                       phong ON FIND_IN_SET(phong.id_phong, datphong.id_phong)
                INNER JOIN 
                        loaiphong on loaiphong.id_loaiphong = phong.loai_phong_id
                WHERE 
                    (datphong.ngay_dat_phong between $firstDayOfMonth AND $lastDayOfMonth)
                AND 
                    datphong.trang_thai = 'Đã thanh toán'
                GROUP BY
                    loaiphong.id_loaiphong
                    ";

        return $this->db->select($sql);
    }


}

?>