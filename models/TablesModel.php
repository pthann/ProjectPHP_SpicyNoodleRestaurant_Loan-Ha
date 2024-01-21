<?php
require_once("models/Model.php");

class TablesModel extends Model {

    public function __construct() {
        parent::__construct("tables");
        $this->table = "tables";
    }

    public function isExistName($name) {
        $connection = new Connection();
        $stmt = $connection->getConnection()->prepare("SELECT id FROM $this->table WHERE name = :name");
        $stmt->bindParam(':name', $name);
        $stmt->execute();
        return $stmt->rowCount() != 0;
    }

    public function getByTableName($name) {
        $connection = new Connection();
        $stmt = $connection->getConnection()->prepare("SELECT * FROM $this->table WHERE name = :name");
        $stmt->bindParam(':name', $name);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function searchByTableKey($key) {
        $connection = new Connection();
        $stmt = $connection->getConnection()->prepare("SELECT * FROM $this->table WHERE id LIKE :key OR name LIKE :key");
        $stmt->bindValue(':key', '%' . $key . '%');
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function createTable($data) {
        $connection = new Connection();
        $stmt = $connection->getConnection()->prepare("INSERT INTO $this->table (name) VALUES (:name)");
        $stmt->bindParam(':name', $data['name']);
        $result = $stmt->execute();
        if ($result) {
            header("Location: /admin/table");
        }
        return $result;
    }

    public function readAllTables() {
        $connection = new Connection();
        $stmt = $connection->getConnection()->prepare("SELECT * FROM $this->table");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function readOneTable($id) {
        $connection = new Connection();
        $stmt = $connection->getConnection()->prepare("SELECT * FROM $this->table WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function updateTable($data, $id) {
        $connection = new Connection();
        $stmt = $connection->getConnection()->prepare("UPDATE $this->table SET name= :name WHERE id = :id");
        $stmt->bindParam(':name', $data['name']);
        $stmt->bindParam(':id', $id);
        $result = $stmt->execute();
        if ($result) {
            header("Location: /admin/table");
        }
        return $result;
    }

    public function deleteTable($id) {
        $connection = new Connection();
        $stmt = $connection->getConnection()->prepare("DELETE FROM $this->table WHERE id = :id");
        $result = $stmt->bindParam(':id', $id);
        if ($result) {
            header("Location: /admin/table");
        }
        return $stmt->execute();
    }
}
?>
