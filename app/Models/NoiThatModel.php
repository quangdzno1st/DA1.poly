<?php


class NoiThatModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getAllNoiThat()
    {
        $sql = "SELECT 
                     * 
                FROM
                    noithat
                WHERE 
                    1 = 1 
                    ";


        return $this->db->select($sql);
    }
    public function insert($data)
    {
        return $this->db->insert("noithat_loaiiphong", $data);
    }

    public function getById($id){
        $sql = "SELECT * FROM images WHERE id = :id";
        $data = [
            "id" => $id
        ];

        return $this->db->selectById($sql,$data);
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

        $sql = "SELECT * FROM images WHERE id_loaiphong = $id";
       return $this->db->select($sql);
   }

   public function deleteByIdRoomType($id){
       $idDelete = " id_loaiphong = $id ";
       return $this->db->delete("noithat_loaiiphong", $idDelete, 999);
   }
}

?>