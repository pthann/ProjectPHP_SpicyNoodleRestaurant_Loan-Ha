<?php

require_once("models/Model.php");

class RegisterModel extends Model {
    public function __construct() {
        parent::__construct("users");
        $this->table = "users";
    }

    public function createRegister($data) {
        $role = $data['role'];;
        $connection = new Connection();
        $stmt = $connection->getConnection()->prepare("INSERT INTO $this->table (name , email, password, role, telephone, avatar) VALUES ( :name, :email, :password, :role, :telephone, :avatar)");
        $stmt->bindParam(':name', $data['name']);
        $stmt->bindParam(':email', $data['email']);
        $stmt->bindParam(':password', $data['password']);
        $stmt->bindParam(':role', $role);
        $stmt->bindParam(':telephone', $data['telephone']);
        $stmt->bindParam(':avatar', $data['avatar']);
        $result = $stmt->execute();
        if ($result) {
            echo '<script>window.location.href = "login";</script>';
        }
        return $result;
    }
    public function isExistName($email) {
        $connection = new Connection();
        $stmt = $connection->getConnection()->prepare("SELECT id FROM $this->table WHERE email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        return $stmt->rowCount() != 0;
    }
}
