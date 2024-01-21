<?php
require_once("models/Model.php");

class OrderModel extends Model {

    public function __construct() {
        parent::__construct("orders","food");
        $this->table = "orders";
        $this->table_d = "food";
     
    }

    public function isExistName($name) {
        $connection = new Connection();
        $stmt = $connection->getConnection()->prepare("SELECT id FROM $this->table WHERE name = :name");
        $stmt->bindParam(':name', $name);
        $stmt->execute();
        return $stmt->rowCount() != 0;
    }

    public function getid_namefood()
    {
        $connection = new Connection();
        $stmt = $connection->getConnection()->prepare("SELECT `$this->table_d`.*
        FROM `$this->table_d`
        JOIN `$this->table` AS `o` ON `$this->table_d`.id = `o`.id_foood;");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
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
        $stmt = $connection->getConnection()->prepare("INSERT INTO $this->table (
            id_foood,
            id_user,
            customer_name,
            code,
            qty, 
            phone, 
            table_id, 
            description
            ) VALUES (:id_foood, :id_user, :customer_name,:code, :qty, :phone, :table_id, :description)");
        $stmt->bindParam(':id_foood', $data['id_foood']);
        $stmt->bindParam(':id_user', $data['id_user']);
        $stmt->bindParam(':customer_name', $data['customer_name']);
        $stmt->bindParam(':code', $data['code']);

        $stmt->bindParam(':qty', $data['qty']);
        $stmt->bindParam(':phone', $data['phone']);
        $stmt->bindParam(':table_id', $data['table_id']);
        $stmt->bindParam(':description', $data['description']);
        $result = $stmt->execute();
    
        if ($result) {
            header("Location: /admin/order");
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
        $stmt = $connection->getConnection()->prepare("UPDATE $this->table SET 
        id_foood = :id_foood, 
        id_user = :id_user, 
        customer_name = :customer_name, 
        phone = :phone, 
        table_id = :table_id, 
        code = :code, 
        description = :description WHERE id = :id");
        $stmt->bindParam(':id_foood', $data['id_foood']);
        $stmt->bindParam(':id_user', $data['id_user']);
        $stmt->bindParam(':customer_name', $data['customer_name']);
        $stmt->bindParam(':phone', $data['phone']); 
        $stmt->bindParam(':table_id', $data['table_id']);
        $stmt->bindParam(':code', $data['code']);
        $stmt->bindParam(':description', $data['description']);
        $stmt->bindParam(':id', $id);
        $result = $stmt->execute();
        if ($result) {
            header("Location: /admin/order");
        }
        return $result;
    }

    public function updateqty($data, $id) {
        $connection = new Connection();
        $stmt = $connection->getConnection()->prepare("UPDATE $this->table SET qty = :qty WHERE id = :id");
        $stmt->bindParam(':qty', $data['qty']);
        $stmt->bindParam(':id', $id);
        $result = $stmt->execute();
        if ($result) {
            header("Location: /admin/order");
        }
        return $result;
    }

    public function delete($id) {
        $connection = new Connection();
        $stmt = $connection->getConnection()->prepare("DELETE FROM $this->table WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $result = $stmt->execute();
        if ($result) {
            header("Location: /admin/order");
        }
        return $result;
    }
}
?>