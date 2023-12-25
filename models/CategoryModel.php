<?php


require_once("models/Model.php");

class CategoryModel extends Model {

    public function __construct() {
        parent::__construct("category");
        $this->table = "category";
    }

    public function isExistName($name) {
        $connection = new Connection();
        $stmt = $connection->getConnection()->prepare("SELECT id FROM $this->table WHERE name='$name'"); 
        $stmt->execute();  
        return $stmt->rowCount() != 0;
    }

    public function getByName($name) {
        $connection = new Connection();
        $stmt = $connection->getConnection()->prepare("SELECT * FROM $this->table WHERE name='$name'"); 
        $stmt->execute();  
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function searchBy($key) {
        $connection = new Connection();
        $stmt = $connection->getConnection()->prepare("SELECT * FROM $this->table WHERE id LIKE '%$key%' OR name LIKE '%$key%'"); 
        $stmt->execute();  
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>