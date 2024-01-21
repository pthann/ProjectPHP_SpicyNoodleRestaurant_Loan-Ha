<?php

class DetailFoodModel extends Model {
    public function __construct() {
        parent::__construct("food");
        $this->table = "food";
    }

    public function addToCart($userId, $foodID) {
        $connection = new Connection();
        $stmt = $connection->getConnection()->prepare("INSERT INTO cart (user_id,food_id) VALUES (:user_id, :food_id)");
        $stmt->bindParam(':user_id', $userId);
        $stmt->bindParam(':food_id', $foodID);
        $result = $stmt->execute();
        if ($result) {
            echo '<script>window.location.href = "cart";</script>';
        }
        return $result;
    }

}
?>