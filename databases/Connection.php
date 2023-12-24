<?php
require_once("configs/DatabaseConfig.php");

class Connection {
    private $connection;

    public function __construct() {
        try {
            $this->connection = new PDO("mysql:host=".HOST_NAME.";dbname=".DB_NAME, USER_NAME, PASSWORD);
            // set the PDO error mode to exception
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public function getConnection() {
        return $this->connection;
    }
}
?>