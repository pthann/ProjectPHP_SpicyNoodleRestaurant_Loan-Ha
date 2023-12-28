<?php
require_once("models/Model.php");

class TablesModel extends Model {

    public function __construct() {
        parent::__construct("tables");
        $this->table = "tables";
    }

    public function isExistNameTable($name) {
        $connection = new Connection();
        $stmt = $connection->getConnection()->prepare("SELECT table_id FROM $this->table WHERE nameTable = :name");
        $stmt->bindParam(':name', $name);
        $stmt->execute();  
        return $stmt->rowCount() != 0;
    }

    public function getByNameTable($name) {
        $connection = new Connection();
        $stmt = $connection->getConnection()->prepare("SELECT * FROM $this->table WHERE nameTable = :name");
        $stmt->bindParam(':name', $name);
        $stmt->execute();  
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function searchByNameOrId($key) {
        $connection = new Connection();
        $stmt = $connection->getConnection()->prepare("SELECT * FROM $this->table WHERE table_id LIKE :key OR nameTable LIKE :key");
        $stmt->bindValue(':key', "%$key%");
        $stmt->execute();  
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
