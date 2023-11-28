<?php


class ImagesModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getAllImages()
    {
        $sql = "SELECT * FROM images";

        return $this->db->select($sql);
    }

    public function getById($id){
        $sql = "SELECT * FROM images WHERE id = :id";
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
        $sql = "DELETE FROM images WHERE id_loaiphong = $id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
   }
   public function getImageByRoomId($id){

        $sql = "SELECT * FROM images WHERE id_loaiphong = $id";
       return $this->db->select($sql);
   }

   public function deleteById($id){
       $idDelete = "id = $id";
       return $this->db->delete("images", $idDelete);
   }
}

?>