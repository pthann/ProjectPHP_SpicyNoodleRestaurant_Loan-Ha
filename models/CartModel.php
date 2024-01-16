<?php

include_once('helpers/CrudHelper.php');

class CartModel extends Model {

    public function __construct() {
        parent::__construct("cart");
        $this->table = "cart";
    }

    public function getAllListOrder(){
        $connection = new Connection();
        $stmt = $connection->getConnection()->prepare("SELECT * FROM $this->table WHERE user_id = :user_id");
        $stmt->bindParam(':user_id', $_SESSION["userLogin"]);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    private function getFoodImageLink($foodId) {
        $foodDetails = $this->crudHelper->readOne('food', $foodId);
        return isset($foodDetails['image_link']) ? $foodDetails['image_link'] : '';
    }

    public function increaseQuantity($itemId) {
        session_start();

        if (isset($_SESSION['cart'][$itemId])) {
            $_SESSION['cart'][$itemId]['quantity']++;
        }
    }

    public function decreaseQuantity($itemId) {
        session_start();

        if (isset($_SESSION['cart'][$itemId])) {
            if ($_SESSION['cart'][$itemId]['quantity'] > 1) {
                $_SESSION['cart'][$itemId]['quantity']--;
            }
        }
    }

    public function removeItem($itemId) {
        session_start();

        unset($_SESSION['cart'][$itemId]);
    }

    public function getCartData() {
        session_start();
        return isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
    }
}
?>
