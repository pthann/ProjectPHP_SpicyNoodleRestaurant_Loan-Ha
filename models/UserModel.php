<?php


require_once("models/Model.php");

class UserModel extends Model {

    public function __construct() {
        parent::__construct("user");
        $this->table = "user";
    }

    public function authenticateWithEmail($email, $password) {
        $connection = new Connection();
        $stmt = $connection->getConnection()->prepare("SELECT email, password  FROM $this->table WHERE email='$email'"); 
        $stmt->execute();  
        return password_verify($password, $stmt->fetch(PDO::FETCH_ASSOC)["password"]); 
    }

    public function authenticateWithTelephone($telephone, $password) {
        $connection = new Connection();
        $stmt = $connection->getConnection()->prepare("SELECT telephone, password  FROM $this->table WHERE telephone='$telephone'"); 
        $stmt->execute();  
        return password_verify($password, $stmt->fetch(PDO::FETCH_ASSOC)["password"]); 
    }

    public function getIdFromEmail($email) {
        $connection = new Connection();
        $stmt = $connection->getConnection()->prepare("SELECT id  FROM $this->table WHERE email='$email'"); 
        $stmt->execute();  
        return $stmt->fetch(PDO::FETCH_ASSOC)["id"];
    }

    public function getRoleFromEmail($email) {
        $connection = new Connection();
        $stmt = $connection->getConnection()->prepare("SELECT role  FROM $this->table WHERE email='$email'"); 
        $stmt->execute();  
        return $stmt->fetch(PDO::FETCH_ASSOC)["rode"];
    }

    public function isExistEmail($email) {
        $connection = new Connection();
        $stmt = $connection->getConnection()->prepare("SELECT email FROM $this->table WHERE email='$email'"); 
        $stmt->execute();  
        return $stmt->rowCount() != 0;
    }

    public function isExistTelephone($telephone) {
        $connection = new Connection();
        $stmt = $connection->getConnection()->prepare("SELECT telephone FROM $this->table WHERE telephone='$telephone'"); 
        $stmt->execute();  
        return $stmt->rowCount() != 0;
    }
}
?>