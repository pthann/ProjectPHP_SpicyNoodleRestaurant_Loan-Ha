<?php
require_once("models/Model.php");

class UsersModel extends Model {

    public function __construct() {
        parent::__construct("users");
        $this->table = "users";
    }

    public function isExistEmail($email) {
        $connection = new Connection();
        $stmt = $connection->getConnection()->prepare("SELECT id FROM $this->table WHERE email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        return $stmt->rowCount() != 0;
    }
   
    public function getAvatarFromId($id) {
        $connection = new Connection();
        $stmt = $connection->getConnection()->prepare("SELECT `avatar` FROM $this->table WHERE id='$id'"); 
        $stmt->execute();  
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
    
        if ($result && isset($result["avatar"])) {
            return $result["avatar"];
        } else {
            return null; 
        }
    }
    
    public function readAllUsers() {
        $connection = new Connection();
        $stmt = $connection->getConnection()->prepare("SELECT * FROM $this->table");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function readOneUser($id) {
        $connection = new Connection();
        $stmt = $connection->getConnection()->prepare("SELECT * FROM $this->table WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function updateUser($data, $id) {
        $connection = new Connection();
        $stmt = $connection->getConnection()->prepare("UPDATE $this->table SET email = :email, name = :name, role = :role, block = :block, avatar = :avatar, telephone = :telephone WHERE id = :id");
    
        $stmt->bindParam(':email', $data['email']);
        $stmt->bindParam(':name', $data['name']);
        $stmt->bindParam(':avatar', $data['avatar']);
        $stmt->bindParam(':role', $data['role']);
        $stmt->bindParam(':block', $data['block']);
        $stmt->bindParam(':telephone', $data['telephone']);
        $stmt->bindParam(':id', $id);
        $result = $stmt->execute();
        if ($result) {
            header("Location: /admin/user");
        }
        return $result;  
    }
    

    public function deleteUser($id) {
        $connection = new Connection();
        $stmt = $connection->getConnection()->prepare("DELETE FROM $this->table WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $result = $stmt->execute();
        if ($result) {
            header("Location: /admin/user");
        }
        return $result;
    }

    public function searchByUserKey($key) {
        $connection = new Connection();
        $stmt = $connection->getConnection()->prepare("SELECT * FROM $this->table WHERE id LIKE :key OR name LIKE :key OR email LIKE :key");
        $stmt->bindValue(':key', '%' . $key . '%');
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
