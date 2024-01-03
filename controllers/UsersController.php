<?php

require_once("models/UserModel.php");
require_once("models/UsersModel.php"); 

class UsersController extends Controller {
    public function getView() {
        session_start();
        if (!isset($_SESSION['userLogin'])) {
            $this->redirect("/admin/login");
        } else if ($_SESSION["userRole"] == "ADMIN" || $_SESSION["userRole"] == "MANAGER") {
            $this->processData();
            $this->processEventOnView();
            $this->renderView("admin/UsersPage"); // Corrected view name
        } else {
            include("views/NotFoundPage.php");
        }
    }
 
    public function processEventOnView() {
        if (isset($_POST["deleteUser"])) {
            $this->deleteUserEvent();
        }

        if (isset($_POST["updateUser"])) {
            $this->editUserEvent();
        }
        if (isset($_GET["search"])) {
            $this->searchUserEvent($_GET["search"]);
        }
    }

    public function processData() {
        $usersModel = new UsersModel(); 
        $this->setData("title", "Users");
        //$this->setData("avatar", $usersModel->getAvatarFromId($_SESSION["userLogin"]));
        $this->setData("users", $usersModel->readAllUsers()); 
    }


    public function editUserEvent() {
        $usersModel = new UsersModel(); 

        $id = $_POST["id"];
        $email = $_POST["email"];
        $name = $_POST["name"];
        $role = $_POST["role"];
        $block = isset($_POST["block"]) ? 1 : 0;

        // Validation
        if (empty($email) || empty($name) || empty($role)) {
            $this->setData("errorMessage", "Please fill in all required fields.");
        } else {
            $user = $usersModel->readOneUser($id); 
            $currentEmail = $user["email"];

            if ($email !== $currentEmail && $usersModel->isExistEmail($email)) { 
                $this->setData("errorMessage", "Email already exists.");
            } else {
                $updatedUserData = [
                    "email" => $email,
                    "name" => $name,
                    "role" => $role,
                    "block" => $block
                    
                ];

                $usersModel->updateUser($updatedUserData, $id); 
                $this->setData("successMessage", "User updated successfully!");
            }
        }
    }

    public function deleteUserEvent() {
        $usersModel = new UsersModel(); 
        $usersModel->deleteUser($_POST["id"]); 
        $this->setData("successMessage", "User deleted successfully!");
    }

    public function searchUserEvent($key) {
        $usersModel = new UsersModel(); 
        $this->setData("users", $usersModel->searchByUserKey($key)); 
    }

   
}
