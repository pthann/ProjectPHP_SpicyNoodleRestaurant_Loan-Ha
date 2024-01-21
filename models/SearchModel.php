<?php
require_once("models/Model.php");

class SearchModel extends Model {

    public function __construct() {
        parent::__construct("food");
        $this->table = "food";
    }

    public function searchBy($key) {
        $connection = new Connection();
        $stmt = $connection->getConnection()->prepare("SELECT * FROM $this->table WHERE name LIKE :key");
        $stmt->bindValue(':key', '%' . $key . '%');
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
