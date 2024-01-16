<?php
require_once("models/CartModel.php");

class CartController extends Controller {

    public function getView() {
        session_start();
        
        if (!isset($_SESSION['userLogin'])) {
            $this->redirect("/admin/login");
        } else {
            $this->processData();
            include_once("views/pages/user/CartPage.php");
        }
    }
    
    public function processData() {
        $foodModel = new CartModel();
        $this->setData("cart", $foodModel->readAll());
        $foodModel = new ProductModel();
        $this->setData("food", $foodModel->readAll());
    }
    public function getCartView() {
        $cartModel = new CartModel();
        $cart = $cartModel->getCartData();
        $this->renderView("user/CartPage", ['cart' => $cart]);
    }
    
    public function increaseQuantityEvent() {
        $itemId = $_POST['itemId'];
        $cartModel = new CartModel();
        $cartModel->increaseQuantity($itemId);
        $this->redirect('/cart');
    }

    public function decreaseQuantityEvent() {
        $itemId = $_POST['itemId'];
        $cartModel = new CartModel();
        $cartModel->decreaseQuantity($itemId);
        $this->redirect('/cart');
    }

    public function removeItemEvent() {
        $itemId = $_POST['itemId'];
        $cartModel = new CartModel();
        $cartModel->removeItem($itemId);
        $this->redirect('/cart');
    }
    
    
}
?>
