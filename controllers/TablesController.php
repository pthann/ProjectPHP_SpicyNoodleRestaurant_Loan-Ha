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
        $this->setData("tables", $tablesModel->readAllTables());
    }

    public function addTableEvent() {
        $tablesModel = new TablesModel();

        $name = $_POST["name"];
   
        if (empty($name) || trim($name) == "") {
            $this->setData("errorMessage", "Table name is blank.");
        } else {
            if ($tablesModel->isExistName($name)) {
                $this->setData("errorMessage", "Table name already exists.");
            } else {
                $tableData = [
                    "name" => $name
                ];

                $tablesModel->createTable($tableData);
                $this->setData("successMessage", "Table added successfully!");
            }
        }
    }

    public function editTableEvent() {
        $tablesModel = new TablesModel();

        $id = $_POST["id"];
        $name = $_POST["name"];
       
        if (empty($name) || trim($name) == "") {
            $this->setData("errorMessage", "Table name is blank.");
        } else {
            $table = $tablesModel->readOneTable($id);
            $currentName = $table["name"];

            if ($name !== $currentName && $tablesModel->isExistName($name)) {
                $this->setData("errorMessage", "Table name already exists.");
            } else {
                $updatedTableData = [
                    "name" => $name
                ];

                $tablesModel->updateTable($updatedTableData, $id);
                $this->setData("successMessage", "Table updated successfully!");
            }
        }
    }

    public function deleteTableEvent() {
        $tablesModel = new TablesModel();
        $tablesModel->deleteTable($_POST["id"]);
        $this->setData("successMessage", "Table deleted successfully!");
    }

    public function searchTableEvent($key) {
        $tablesModel = new TablesModel();
        $this->setData("tables", $tablesModel->searchByTableKey($key));
    }
}
