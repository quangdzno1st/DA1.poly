<?php
class Database extends PDO

{
    public function __construct($conn, $user, $password)
    {
        parent::__construct($conn, $user, $password);
//        $db = new PDO($conn, $user, $password);
    }

    public function select($sql)
    {
        $statement = $this->prepare($sql);
        $statement->execute();
        return $statement->fetchAll();
    }
//    public function selectById($table,$id){
//        $sql = "SELECT * FROM $table where id_category_product = :id_category_product";
//        $statement = $this->prepare($sql);
//        $statement->bindParam('id_category_product',$id);
//        $statement->execute();
//        return $statement->fetch();
//    }

    public function selectById($sql, $data = [])
    {
        $statement = $this->prepare($sql);
        foreach ($data as $key => $value) {
            $statement->bindValue(":$key", $value);
        }
//        echo "<pre>";
//        echo $sql;
//        print_r($data);
        $statement->execute();
        return $statement->fetchAll();
    }

    public function insert($tableName, $data)
    {

        $keys = implode(',', array_keys($data));
        $value = ":" . implode(',:', array_keys($data));

        $sql = "INSERT INTO $tableName ($keys) values ($value)";
        $stmt = $this->prepare($sql);
        foreach ($data as $key => $value) {
            $stmt->bindValue(":$key", $value);
        }
        return $stmt->execute();
    }

    public function update($tableName, $data, $condition)
    {
        $updateKey = null;
        foreach ($data as $key => $value) {
            $updateKey .= "$key =:$key,";
        }
        $updateKey = rtrim($updateKey, ',');
        $sql = "UPDATE $tableName SET $updateKey where $condition";
        $stmt = $this->prepare($sql);
        foreach ($data as $key => $value) {
            $stmt->bindValue("$key", $value);
        }
        return $stmt->execute();
    }

    public function delete($tableName, $condition, $limit = 1)
    {
        $sql = "DELETE FROM $tableName WHERE $condition limit $limit";
        return $this->exec($sql);
    }


    public function affectedRows($sql, $username, $password)
    {
        $stmt = $this->prepare($sql);
        $test = $stmt->execute([$username, $password]);
        return $stmt->rowCount();
    }

    public function selectUser($sql, $username, $password)
    {
        $stmt = $this->prepare($sql);
        $test = $stmt->execute([$username, $password]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function selectLatest($tableName,$condition){
        $sql = "SELECT * FROM $tableName ORDER BY $condition desc limit 1";
        $stmt = $this->prepare($sql);
          $stmt->execute();

        return $stmt->fetch();
    }
}