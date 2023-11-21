<?php


class UserModel extends Model
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

    public function getUserById($id){
        $sql = "SELECT * FROM khachhang WHERE id_khachhang = :id";
        $data = [
            "id" => $id
        ];

        return $this->db->selectById($sql,$data);
    }

    public function insertImage($data)
    {
        return $this->db->insert("images", $data);
    }

    public function delete($id)
    {
        $idDelete = "id_phong = $id";
        return $this->db->delete("images", $idDelete);
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