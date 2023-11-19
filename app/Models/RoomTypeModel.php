<?php


class RoomTypeModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getAllLoai()
    {
        $sql = "SELECT * FROM loaiphong";
        return $this->db->select($sql);
    }

    public function getById($id){
        $sql = "SELECT * FROM loaiphong WHERE id_loaiphong = :id";
        $data = [
            "id" => $id,
        ];
        return $this->db->selectById($sql, $data);
    }

    public function update($data, $id)
    {
        $idUpdate = " id_loaiphong = " . $id;
        return $this->db->update("loaiphong", $data, $idUpdate);
    }

    public function delete($id)
    {
        $idDelete = "id_loaiphong = " . $id;
        return $this->db->delete("loaiphong", $idDelete);
    }

    public function insert($data)
    {
        return $this->db->insert("loaiphong", $data);
    }
}

?>