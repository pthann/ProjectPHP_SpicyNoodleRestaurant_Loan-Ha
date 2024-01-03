<?php

require_once("models/UserModel.php");
require_once("models/FoodModel.php");

class FoodController extends Controller {
    public function getView() {
        session_start();
        if (!isset($_SESSION['userLogin'])) {
            $this->redirect("/admin/login");
        } else if ($_SESSION["userRole"] == "ADMIN" || $_SESSION["userRole"] == "MANAGER") {
            $this->processData();
            $this->processEventOnView();
            $this->renderView("admin/FoodPage"); 
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
        $userModel = new UserModel();
        $foodModel = new FoodModel();
        $this->setData("title", "Food");
        $this->setData("avatar", $userModel->getAvatarFromId($_SESSION["userLogin"]));
        $this->setData("foods", $foodModel->readAll());
    }

    public function addFoodEvent() {
        $foodModel = new FoodModel();
        $name = $_POST["name"];
        $imageLink = $_POST["image_link"]; 
        $price = $_POST["price"]; 
        $description = $_POST["description"]; 
        // Validation
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
        $foodModel = new FoodModel();

        $id = $_POST["id"];
        $name = $_POST["name"];
        $imageLink = $_POST["image_link"]; 
        $price = $_POST["price"]; 
        $description = $_POST["description"]; 
        // Validation
        if (empty($name) || trim($name) == "") {
            $this->setData("errorMessage", "Food name is blank.");
        } else {
            $food = $foodModel->readOne($id);
            $currentName = $food["name"];

            if ($name !== $currentName && $foodModel->isExistName($name)) {
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
        $foodModel = new FoodModel();
        $foodModel->delete($_POST["id"]);
        $this->setData("successMessage", "Food deleted successfully!");
    }

    public function searchFoodEvent($key) {
        $foodModel = new FoodModel();
        $this->setData("foods", $foodModel->searchBy($key));
    }
}
