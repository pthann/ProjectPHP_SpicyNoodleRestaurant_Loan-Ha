<?php
require_once("models/UsersModel.php");
require_once("models/DetailFoodModel.php");

class DetailFoodController extends Controller {

    public function getView() {
        session_start();
        if (!isset($_SESSION['userLogin'])) {
            $this->redirect("/admin/login");
        } else {
            $this->processData();
            include_once("views/pages/user/DetailFoodPage.php");
                $this->addProductCart();
        }
       
    }

    public function addProductCart(){
        if (isset($_POST["add"])) {
            $this->addToCartEvent();
        }
    }
    
    public function processData() {
        $userModel = new UsersModel();
        $foodModel = new DetailFoodModel(); 
        $foods = $foodModel->readAll(); 
        $foodId = $_GET['id']; 
        $specificFood = array_filter($foods, function ($food) use ($foodId) {
            return $food['id'] == $foodId;
        });
        $this->setData("food", $specificFood);
    }

    public function addToCartEvent() {
        header("Location: /cart");
        $cartModel = new DetailFoodModel() ;
        $cartModel->addToCart($_SESSION["userLogin"], $_GET["id"] );
    }

    }        
?>













