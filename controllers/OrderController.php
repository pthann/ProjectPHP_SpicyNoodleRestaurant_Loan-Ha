<?php
require_once("models/OrderModel.php");
require_once("models/ProductModel.php");
require_once("models/TablesModel.php");
require_once("models/UsersModel.php");

class OrderController extends Controller {
    public function getView() {
        session_start();
        if (!isset($_SESSION['userLogin'])) {
            $this->redirect("/admin/login");
        } else if ($_SESSION["userRole"] == "ADMIN" || $_SESSION["userRole"] == "MANAGER") {
            $this->processData();
            $this->processEventOnView();
            $this->renderView("admin/OderPage"); 
        } else {
            include("views/NotFoundPage.php");
        }
    }
    
    public function processEventOnView() {
        if (isset($_POST["addorderFood"])) {
            $this->addOrderFoodEvent();
        }

        if (isset($_POST["deleteFood"])) {
            $this->deleteFoodEvent();
        }

        if (isset($_POST["updateorderFood"])) {
            $this->editOrderFoodEvent();
        }

        if (isset($_POST["update_option"])) {
            $this->editoptionFoodEvent();
        }

        if (isset($_GET["search"])) {
            $this->searchFoodEvent($_GET["search"]);
        }
    }

    public function editoptionFoodEvent() {
        $foodModel = new OrderModel();
        $id = $_POST["id_option"];
        $option_order = $_POST["option_order"];
        $food = $foodModel->readOne($id);
        $updatedFoodData = [
            "option_order" => $option_order
        ];
        $foodModel->updateqty($updatedFoodData, $id);
        $_SESSION['successMessageOption'] = "Food updated successfully!";

        echo '<script>window.location.href = "/admin/order";</script>';

    }


    
    public function processData() {
        $orderModel = new OrderModel();
        $foodModel = new ProductModel();
        $tableModel = new TablesModel();
        $usersModel = new UsersModel();
    
        $this->setData("title", "Order");
        $this->setData("order", $orderModel->readAll());
        $this->setData("foods", $foodModel->readAll());
        $this->setData("tables", $tableModel->readAllTables());
        $this->setData("users", $usersModel->readAllUsers());
        $this->setData("name_id", $orderModel->getid_namefood());
    }
    
    public function getFoodNameById($foodId)
    {
        foreach ($this->getData("name_id") as $food) {
            if ($food['id'] == $foodId) {
                
                return [
                    'name' => $food['name'],
                    'price' => $food['price'],
                ];
            }
        }
        return [
            'name' => 'Unknown Food',
            'price' => 'Unknown Price',
        ];
    }
    
    public function addOrderFoodEvent() {
        $orderModel = new OrderModel();
    
        $id_fooods = isset($_POST["id_food"]) ? $_POST["id_food"] : [];
        $id_user = $_POST["id_user"];
        $customer_name = $_POST["customer_name"];
        $code = $_POST["code"];
        $qty = $_POST["qty"];
        $phone = $_POST["phone"];
        $table_id = $_POST["table_id"];
        $description = $_POST["description"];
    
        foreach ($id_fooods as $id_foood) {
            $foodData = [
                "id_foood" => $id_foood,
                "id_user" => $id_user,
                "customer_name" => $customer_name,
                "code" => $code,
                "qty" => $qty,
                "phone" => $phone,
                "table_id" => $table_id,
                "description" => $description
            ];
    
            $orderModel->create($foodData);
        }
    
        $this->setData("successMessage", "Order Food added successfully!");
    }


    public function editOrderFoodEvent() {
        $foodModel = new OrderModel();
    
        if (empty($_POST["id_foood"]) || empty($_POST["id_user"]) || empty($_POST["customer_name"]) || empty($_POST["phone"]) || empty($_POST["table_id"])) {
            $this->setData("errorMessage", "Please fill in all required fields.");
            return;
        }
    
        $id = $_POST["id"];
        $id_foood = $_POST["id_foood"];
        $id_user = $_POST["id_user"];
        $customer_name = $_POST["customer_name"];
        $phone = $_POST["phone"];
        $table_id = $_POST["table_id"];
        $description = $_POST["description"];
        $code = $_POST["code"];
        $updatedFoodData = [
            "id_foood" => $id_foood,
            "id_user" => $id_user,
            "customer_name" => $customer_name,
            "phone" => $phone,
            "table_id" => $table_id,
            "description" => $description,
            "code" => $code,

        ];
    
        $foodModel->update($updatedFoodData, $id);
        $this->setData("successMessage", "Food updated successfully!");
    }
    

  
    
    public function deleteFoodEvent() {
        $foodModel = new OrderModel();
        $foodModel->delete($_POST["id"]);
        $this->setData("successMessage", "Food deleted successfully!");
    }

  

    public function searchFoodEvent($key) {
        $foodModel = new OrderModel();
        $this->setData("foods", $foodModel->searchBy($key));
    }
    
}




    
    



   
    


    

   
    
        


    

   
   

 