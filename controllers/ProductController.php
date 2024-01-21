<?php
require_once("models/UsersModel.php");
require_once("models/ProductModel.php");

class ProductController extends Controller {
    public function getView() {
        session_start();
        if (!isset($_SESSION['userLogin'])) {
            $this->redirect("/admin/login");
        } else if ($_SESSION["userRole"] == "ADMIN" || $_SESSION["userRole"] == "MANAGER") {
            $this->processData();
            $this->processEventOnView();
            $this->renderView("admin/ProductPage"); 
        } else {
            include("views/NotFoundPage.php");
        }
    }

    public function processEventOnView() {
        if (isset($_POST["addFood"])) {
            $this->addFoodEvent();
        }

        if (isset($_POST["deleteFood"])) {
            $this->deleteFoodEvent();
        }

        if (isset($_POST["updateFood"])) {
            $this->editFoodEvent();
        }

        if (isset($_GET["search"])) {
            $this->searchFoodEvent($_GET["search"]);
        }
    }

    public function processData() {
        $userModel = new UsersModel();
        $foodModel = new ProductModel();
        $this->setData("title", "Product");
        $this->setData("avatar", $userModel->getAvatarFromId($_SESSION["userLogin"]));
        $this->setData("foods", $foodModel->readAll());
    }

    public function addFoodEvent() {
        $foodModel = new ProductModel();
        $name = $_POST["name"];
        $imageLink = $_POST["image_link"]; 
        $price = $_POST["price"]; 
        $description = $_POST["description"]; 
       
        if (empty($name) || trim($name) == "") {
            $this->setData("errorMessage", "Food name is blank.");
        } else {
            if ($foodModel->isExistName($name)) {
                $this->setData("errorMessage", "Food name already exists.");
            } else {
                $foodData = [
                    "name" => $name,
                    "image_link" => $imageLink,
                    "price" => $price,
                    "description" => $description
                ];

                $foodModel->create($foodData);
                $this->setData("successMessage", "Food added successfully!");
            }
        }
    }

    public function editFoodEvent() {
        $foodModel = new ProductModel();
    
        $id = $_POST["id"];
        $name = $_POST["name"];
        $imageLink = $_POST["image_link"];
        $price = $_POST["price"];
        $description = $_POST["description"];
    
        if (empty($name) || trim($name) == "") {
            $this->setData("errorMessage", "Food name is blank.");
        } else {
            $food = $foodModel->readOne($id);
    
            if (is_array($food) && isset($food["name"])) {
                $currentName = $food["name"];
            } else {
                $currentName = null;
            }
    
            if ($currentName !== null && $name !== $currentName && $foodModel->isExistName($name)) {
                $this->setData("errorMessage", "Food name already exists.");
            } else {
                $updatedFoodData = [
                    "name" => $name,
                    "image_link" => $imageLink,
                    "price" => $price,
                    "description" => $description
                ];
    
                $foodModel->update($updatedFoodData, $id);
                $this->setData("successMessage", "Food updated successfully!");
            }
        }
    }
    

    public function deleteFoodEvent() {
        $foodModel = new ProductModel();
        $foodModel->delete($_POST["id"]);
        $this->setData("successMessage", "Food deleted successfully!");
    }

    public function searchFoodEvent($key) {
        $foodModel = new ProductModel();
        $this->setData("foods", $foodModel->searchBy($key));
    }
}