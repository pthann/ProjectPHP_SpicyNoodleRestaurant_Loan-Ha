<?php

require_once("models/Model.php");

class LoginModel extends Model {
    public function __construct() {
        parent::__construct("users");
        $this->table = "users";
    }

    public function authenticateUser($email, $password) {
        $connection = new Connection();
        $stmt = $connection->getConnection()->prepare("SELECT * FROM $this->table WHERE email = :email AND password = :password");
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($user) {
            echo '<script>window.location.href = "home";</script>';
        }
        return $user;
    }
    
    public function isExistEmail($email) {
        $connection = new Connection();
        $stmt = $connection->getConnection()->prepare("SELECT id FROM $this->table WHERE email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        return $stmt->rowCount() != 0;
    }
}
