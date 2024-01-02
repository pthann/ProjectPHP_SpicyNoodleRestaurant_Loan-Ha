<?php

require_once("models/UserModel.php");
require_once("models/CategoryModel.php");

class CategoryController extends Controller {

    public function __construct() {
        parent::__construct();
    }
    public function getView() {
        if (!isset($_SESSION)) {
            session_start();
        }
        if (!isset($_SESSION['userLogin'])) {
            $this->redirect("/admin/login");
        } else if ($_SESSION["userRole"] == "ADMIN" || $_SESSION["userRole"] == "MANAGER") {
            $this->renderView("admin/CategoryPage");
        } else {
            include("views/NotFoundPage.php");
        }
    }

    public function processEvent() {
        if (isset($_POST["addCategory"])) {
            $this->addCategoryEvent();
            unset($_POST["addCategory"]);
        }

        if (isset($_POST["deleteCategory"])) {
            $this->deleteCategoryEvent();
            unset($_POST["deleteCategory"]);
        }

        if (isset($_POST["updateCategory"])) {
            $this->editCategoryEvent();
            unset($_POST["updateCategory"]);
        }

        if (isset($_GET["search"])) {
            $this->searchCategoryEvent($_GET["search"]);
        }
    }

    public function processData() {
        $userModel = new UserModel();
        $categoryModel = new CategoryModel();
        $this->setData("title", "Category");
        $this->setData("categories", $categoryModel->readAll());
    }

    public function addCategoryEvent() {
        $categoryModel = new CategoryModel();
        if ($categoryModel->isExistName($_POST["name"])) {
            $_SESSION["errorFlashMessage"] = "Category name already exist.";
        } else if ($_POST["name"] == "" || $_POST["name"] == " ") {
            $_SESSION["errorFlashMessage"] = "Category name is blank.";
        } else {
            $categoryModel->create(["name" => $_POST["name"]]);
            $_SESSION["successFlashMessage"] = "Add successfully!";
        }
    }

    public function editCategoryEvent() {
        $categoryModel = new CategoryModel();
        $category = $categoryModel->readOne($_POST["id"]);
        $categoryName = $category["name"];
        if ($_POST["name"] == "" || $_POST["name"] == " ") {
            $_SESSION["errorFlashMessage"] = "Category name is blank.";
        } else if ($_POST["name"] != $categoryName && $categoryModel->isExistName($_POST["name"])) {
            $_SESSION["errorFlashMessage"] = "Category name already exist.";
        } else {
            $categoryModel->update(["name" => $_POST["name"]], $_POST["id"]);
            $_SESSION["successFlashMessage"] = "Update successfully!";
        }
    }

    public function deleteCategoryEvent() {
        $categoryModel = new CategoryModel();
        $categoryModel->delete($_POST["id"]);
        $_SESSION["successFlashMessage"] = "Delete successfully!";
    }

    public function searchCategoryEvent($key) {
        $categoryModel = new CategoryModel();
        $this->setData("categories", $categoryModel->searchBy($key));
    }
}
