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

    public function addToCartEvent() {
        if (!isset($_SESSION['addtocartfood'])) {
            $_SESSION['addtocartfood'] = array();
        }
    
        if (isset($_POST['add'])) {
            $foodItem = array(
                'user_id'   => $_POST['user_id'],
                'foodId'    => $_POST['foodId'],
                'foodName'  => $_POST['foodName'],
                'foodPrice' => $_POST['foodPrice'],
                'foodimg'   => $_POST['foodimg'],
                'foodqty'   => $_POST['foodqty']
            );
    
            $foodIndex = -1;
            foreach ($_SESSION['addtocartfood'] as $key => $item) {
                if ($item['foodId'] == $foodItem['foodId']) {
                    $foodIndex = $key;
                    break;
                }
            }
    
            if ($foodIndex !== -1) {
                $_SESSION['addtocartfood'][$foodIndex]['foodqty'] += $foodItem['foodqty'];
            } else {
                $_SESSION['addtocartfood'][] = $foodItem;
            }
    
            echo '<script>window.location.href = "cart";</script>';
            exit;
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

    

    }        
?>