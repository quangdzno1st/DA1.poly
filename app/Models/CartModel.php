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

    public function getAllCart()
    {
        $sql = "SELECT 
                    cart.id_cart,
                    cart.id_phong,
                    cart.id_khachhang,
                    cart.so_luong,
                    loaiphong.ten,
                    loaiphong.suc_chua,
                    loaiphong.gia,
                    phong.ten_phong,
                    phong.loai_phong_id,
                    phong.mo_ta,
                    phong.trang_thai,
                    MIN(images.path) AS path
                FROM 
                    cart
                JOIN 
                    phong ON cart.id_phong = phong.id_phong
                JOIN
                    loaiphong ON phong.loai_phong_id = loaiphong.id_loaiphong
                JOIN 
                    khachhang ON cart.id_khachhang = khachhang.id_khachhang
                JOIN 
                    images ON phong.id_phong = images.id_phong
                GROUP BY
                    cart.id_cart,
                    cart.id_phong,
                    cart.id_khachhang,
                    cart.so_luong,
                    phong.ten_phong,
                    phong.loai_phong_id,
                    phong.mo_ta,
                    phong.trang_thai;

                ";

        return $this->db->select($sql);
    }

    public function getCartById($id_cart){
        $sql = "SELECT 
                    cart.id_cart,
                    cart.id_phong,
                    cart.id_khachhang,
                    cart.so_luong,
                    loaiphong.ten,
                    loaiphong.suc_chua,
                    loaiphong.gia,
                    phong.ten_phong,
                    phong.loai_phong_id,
                    phong.mo_ta,
                    phong.trang_thai,
                    MIN(images.path) AS path
                FROM 
                    cart
                JOIN 
                    phong ON cart.id_phong = phong.id_phong
                JOIN
                    loaiphong ON phong.loai_phong_id = loaiphong.id_loaiphong
                JOIN 
                    khachhang ON cart.id_khachhang = khachhang.id_khachhang
                JOIN 
                    images ON phong.id_phong = images.id_phong
                GROUP BY
                    cart.id_cart,
                    cart.id_phong,
                    cart.id_khachhang,
                    cart.so_luong,
                    phong.ten_phong,
                    phong.loai_phong_id,
                    phong.mo_ta,
                    phong.trang_thai;
                where id_cart = :id_cart
                ";
        $data = [
            "id_cart" => $id_cart
        ];

        return $this->db->selectById($sql,$data);
    }

    public function insertCart($data)
    {
        return $this->db->insert("cart", $data);
    }

    public function delete($id)
    {
        $idDelete = "id_cart = $id";
        return $this->db->delete("cart", $idDelete);
    }

    public function deleteALL($id)
    {
        $sql = "DELETE FROM images WHERE id_phong = $id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
    }
    public function getImageByRoomId($id){

        $sql = "SELECT * FROM images WHERE id_phong = $id";
        return $this->db->select($sql);
    }

    public function deleteById($id){
        $idDelete = "id = $id";
        return $this->db->delete("images", $idDelete);
    }
}

?>