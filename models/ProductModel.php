<?php
require_once("models/Model.php");

class ProductModel extends Model {

    public function __construct() {
        parent::__construct("food");
        $this->table = "food";
    }

    public function isExistName($name) {
        $connection = new Connection();
        $stmt = $connection->getConnection()->prepare("SELECT id FROM $this->table WHERE name = :name");
        $stmt->bindParam(':name', $name);
        $stmt->execute();
        return $stmt->rowCount() != 0;
    }

    public function getByName($name) {
        $connection = new Connection();
        $stmt = $connection->getConnection()->prepare("SELECT * FROM $this->table WHERE name = :name");
        $stmt->bindParam(':name', $name);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function searchBy($key) {
        $connection = new Connection();
        $stmt = $connection->getConnection()->prepare("SELECT * FROM $this->table WHERE id LIKE :key OR name LIKE :key");
        $stmt->bindValue(':key', '%' . $key . '%');
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create($data) {
        $connection = new Connection();
        $stmt = $connection->getConnection()->prepare("INSERT INTO $this->table (name, image_link, price, description) VALUES (:name, :image_link, :price, :description)");
        $stmt->bindParam(':name', $data['name']);
        $stmt->bindParam(':image_link', $data['image_link']);
        $stmt->bindParam(':price', $data['price']);
        $stmt->bindParam(':description', $data['description']);
        $result = $stmt->execute();
        if ($result) {
            header("Location: /admin/product");
        }
        return $result;
    }

    public function readAll() {
        $connection = new Connection();
        $stmt = $connection->getConnection()->prepare("SELECT * FROM $this->table");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function readOne($id) {
        $connection = new Connection();
        $stmt = $connection->getConnection()->prepare("SELECT * FROM $this->table WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update($data, $id) {
        $connection = new Connection();
        $stmt = $connection->getConnection()->prepare("UPDATE $this->table SET name = :name, image_link = :image_link, price = :price, description = :description WHERE id = :id");
        $stmt->bindParam(':name', $data['name']);
        $stmt->bindParam(':image_link', $data['image_link']);
        $stmt->bindParam(':price', $data['price']);
        $stmt->bindParam(':description', $data['description']);
        $stmt->bindParam(':id', $id);
        $result = $stmt->execute();
        if ($result) {
            header("Location: /admin/product");
        }
        return $result;
    }

    public function delete($id) {
        $connection = new Connection();
        $stmt = $connection->getConnection()->prepare("DELETE FROM $this->table WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $result = $stmt->execute();
        if ($result) {
            header("Location: /admin/product");
        }
        return $result;
    }
}
?>
