<?php
require_once("models/UserModel.php");
require_once("models/TablesModel.php");

class TablesController extends Controller {
    public function getView() {
        session_start();
        if (!isset($_SESSION['userLogin'])) {
            $this->redirect("/admin/login");
        } else if ($_SESSION["userRole"] == "ADMIN" || $_SESSION["userRole"] == "MANAGER") {
            $this->processData();
            $this->processEventOnView();
            $this->renderView("admin/TablesPage");
        } else {
            include("views/NotFoundPage.php");
        }
    }

    public function processEventOnView() {
        if (isset($_POST["addTable"])) {
            $this->addTableEvent();
        }

        if (isset($_POST["deleteTable"])) {
           $this->deleteTableEvent();
        }

        if (isset($_POST["updateTable"])) {
           $this->editTableEvent();
        }

        if (isset($_GET["search"])) {
            $this->searchTableEvent($_GET["search"]);
         }
    }

    public function processData() {
        $userModel = new UserModel();
        $tablesModel = new TablesModel();
        $this->setData("title", "Tables");
        $this->setData("avatar", $userModel->getAvatarFromId($_SESSION["userLogin"]));
        $this->setData("tables", $tablesModel->readAll());
    }

    public function addTableEvent() {
        $tablesModel = new TablesModel();
        if ($tablesModel->isExistName($_POST["nameTable"])) {
            $this->setData("errorMessage", "Table name already exists.");
        } else if ($_POST["nameTable"] == "" || $_POST["nameTable"] == " ") {
            $this->setData("errorMessage", "Table name is blank.");
        } else {
            $tablesModel->create(["nameTable" => $_POST["nameTable"]]);
            $this->setData("successMessage", "Add successfully!");
        }
    }

    public function editTableEvent() {
        $tablesModel = new TablesModel();
        $table = $tablesModel->readOne($_POST["table_id"]);
        $tableName = $table["nameTable"];

        if ($_POST["nameTable"] == "" || $_POST["nameTable"] == " ") {
            $this->setData("errorMessage", "Table name is blank.");
        } else if ($_POST["nameTable"] != $tableName && $tablesModel->isExistName($_POST["nameTable"])) {
            $this->setData("errorMessage", "Table name already exists.");
        } else {
            $tablesModel->update(["nameTable" => $_POST["nameTable"]], $_POST["table_id"]);
            $this->setData("successMessage", "Update successfully!");
        }        
    }

    public function deleteTableEvent() {
        $tablesModel = new TablesModel();
        $tablesModel->delete($_POST["table_id"]);
        $this->setData("successMessage", "Delete successfully!");
    }

    public function searchTableEvent($key) {
        $tablesModel = new TablesModel();
        $this->setData("tables", $tablesModel->searchBy($key));
    }
}

