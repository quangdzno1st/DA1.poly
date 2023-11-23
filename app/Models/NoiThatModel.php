<?php


class NoiThatModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getAllNoiThatById($id)
    {
        $sql = "SELECT 
                     * 
                FROM
                    noithat
                INNER JOIN 
                    noithat_loaiiphong on noithat_loaiiphong.id_noithat =noithat.id
                WHERE
                    noithat_loaiiphong.id_loaiphong = :id
                    ";

        $data = [
            'id' => $id,
        ];
        return $this->db->selectById($sql,$data);
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
        $sql = "DELETE FROM images WHERE id_phong = $id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
   }
   public function getImageByRoomId($id){

        $sql = "SELECT * FROM images WHERE id_loaiphong = $id";
       return $this->db->select($sql);
   }

   public function deleteById($id1, $id2){
       $idDelete = "id_noithat = $id1 and id_loaiphong = $id2 ";
       return $this->db->delete("noithat_loaiiphong", $idDelete);
   }
}

?>