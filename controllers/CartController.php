<?php
require_once("controllers/Controller.php");
require_once("models/CartModel.php");
require_once("models/TablesModel.php");
require_once("models/OrderModel.php");

class CartController extends Controller {

    public function getView() {
        session_start();
        if (!isset($_SESSION['userLogin'])) {
            $this->redirect("/admin/login");
        } else {
            $this->processData();
            $this->processEventOnView();
            include_once("views/pages/user/CartPage.php");
        }
    }

        // if (isset($_POST["itemId"])) {
        //     $this->removeItemEvent();
        // }

        public function processEventOnView() {
            if (isset($_POST["createAddToOrDer"])) {
                $this->addOrderSessionFoodEvent();
            }

            if (isset($_POST["deleteFood"])) {
                $this->removeItemSessionEvent();
            }

            if (isset($_POST["updateQty"])) {
                $this->updateQuantityEvent();
            }
        }

        public function addOrderSessionFoodEvent() {
            $orderModel = new OrderModel();
        
            $id_user = $_POST["id_user"];
            $customer_name = $_POST["customer_name"];
            $code = $_POST["code"];
            $phone = $_POST["phone"];
            $payment_methods = $_POST["payment_methods"];
            $table_id = $_POST["table_id"];
            $description = $_POST["description"];
            $food_ids = $_POST["food_id"];
            $foodName = $_POST["foodName"];
            $foodimg = $_POST["foodimg"];
            $food_qty = $_POST["food_qty"];
            $foodPrice = $_POST["foodPrice"];
        
            foreach ($food_ids as $key => $food_id) {
                $foodData = [
                    "id_foood" => $food_id,
                    "id_user" => $id_user,
                    "customer_name" => $customer_name,
                    "code" => $code,
                    "foodName" => $foodName[$key],
                    "foodimg" => $foodimg[$key],
                    "qty" => $food_qty[$key],
                    "phone" => $phone,
                    "payment_methods" => $payment_methods,
                    "table_id" => $table_id,
                    "description" => $description,
                    "foodPrice" => $foodPrice[$key],
                ];
        
                $orderModel->create($foodData);
            }
        
            unset($_SESSION['addtocartfood']);
        
            $_SESSION['updateSuccessOrder'] = "Order Success!";
        
            if ($payment_methods == 3) {
                echo '<script>window.location.href = "pay_qr";</script>';
            } else {
                echo '<script>window.location.href = "thankiu";</script>';
            }
        }
        
        
        public function removeItemSessionEvent() {
            $deleteFoodId = $_POST['deleteFoodId'];
            foreach ($_SESSION['addtocartfood'] as $key => $food) {
                if ($food['foodId'] == $deleteFoodId) {
                    unset($_SESSION['addtocartfood'][$key]);
        
                    $_SESSION['deleteSuccess'] = true;
                    break;
                }
            }
        
            echo '<script>window.location.href = "cart";</script>';
            exit;
        }

        public function updateQuantityEvent() {
            $updatedQty = intval($_POST['updatedQty']);
            $foodId = $_POST['foodId'];
        
            if ($updatedQty > 0) {
                foreach ($_SESSION['addtocartfood'] as &$food) {
                    if ($food['foodId'] == $foodId) {
                        $food['foodqty'] = $updatedQty;
                        break;
                    }
                }
            }
        
            $_SESSION['updateSuccess'] = "Quantity updated successfully!";
            
            echo '<script>window.location.href = "cart";</script>';
            exit;
        }
        
        
    
    public function processData() {
        $cartModel = new CartModel();
        $foodModel = new ProductModel();
        $tableModel = new TablesModel();
        
        $this->setData("cart", $cartModel->readAll());
        $this->setData("food", $foodModel->readAll());
        $this->setData("tables", $tableModel->readAllTables());
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
        echo "bnfherhjfxvbdfjbvdbj";
        $itemId = $_POST['itemId'];
        $cartModel = new CartModel();
        $cartModel->removeItem($itemId);
    }

    public function placeOrderEvent() {
        $this->redirect('/payment');
    }
}
?>