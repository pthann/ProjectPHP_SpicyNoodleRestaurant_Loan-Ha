<?php
require_once("models/ProfileModel.php"); 

class ProfileController extends Controller {
    public function getView() {
        session_start();
        if (!isset($_SESSION['userLogin'])) {
            $this->redirect("/admin/login");
        } else if ($_SESSION["userRole"] == "ADMIN" || $_SESSION["userRole"] == "USER") {
            $this->processProfileView();
        } else {
            include("views/NotFoundPage.php");
        }
    }

    public function processEventOnView() {

        if (isset($_POST["updateprofileUser"])) {
            $this->editUserProfileEvent();
        }
        if(isset($_POST["updatePasswordProfile"])){
            $this->editPasswordProfileEvent();
        }
    
    }

    private function processProfileView() {
        $userData = $this->profileData();
        $this->setData("userData", $userData);
        $this->processData();
        $this->processEventOnView();
        $this->renderView("admin/ProfilePage");
    }

    public function editUserProfileEvent() {
    
        $usersModel = new ProfileModel(); 

        $id = isset($_POST["id"]) ? $_POST["id"] : '';
        $email = isset($_POST["email"]) ? $_POST["email"] : '';
        $name = isset($_POST["name"]) ? $_POST["name"] : '';
        $role = isset($_POST["role"]) ? $_POST["role"] : '';
        $telephone = isset($_POST["telephone"]) ? $_POST["telephone"] : '';
        $avatar = isset($_POST["avatar"]) ? $_POST["avatar"] : '';
        $block = isset($_POST["block"]) ? 1 : 0;
    
        if (empty($email) || empty($name) || empty($avatar) || empty($telephone)|| empty($role)) {
            $this->setData("errorMessage", "Please fill in all required fields.");
        } else {
            $user = $usersModel->readOneProfileUser($id); 
            $currentEmail = $user["email"];
    
            if ($email !== $currentEmail && $usersModel->isExistProfileEmail($email)) { 
                $this->setData("errorMessage", "Email already exists.");
            } else {
                $updatedUserProfileData = [
                    "email" => $email,
                    "name" => $name,
                    "role" => $role,
                    "avatar" => $avatar,
                    "telephone" => $telephone,
                    "block" => $block
                ];
    
                $usersModel->updateProfileUser($updatedUserProfileData, $id); 
                $this->setData("successMessage", "User updated successfully!");
            }
        }
    }

    public function editPasswordProfileEvent() {
        $usersModel = new ProfileModel();
    
        $id = isset($_POST["id"]) ? $_POST["id"] : '';
        $password = isset($_POST["password"]) ? $_POST["password"] : '';
    
        if (empty($password)) {
            $this->setData("errorMessage", "Please fill in all required fields.");
        } else {
            if ($this->isValidPassword($password)) {
                $updatedUserProfileData = [
                    "password" => password_hash($password, PASSWORD_DEFAULT)
                ];
    
                $usersModel->updatePasswordProfileUser($updatedUserProfileData, $id);
                $this->setData("successMessage", "User updated password successfully!");
            } else {
                $this->setData("errorMessage", "Password must contain at least one uppercase letter, one digit, and be at least 8 characters long.");
            }
        }
    }
    
    private function isValidPassword($password) {
        return preg_match('/^(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*()-_+=]).{8,}$/', $password);
    }
    


    public function profileData() {
        if (isset($_SESSION['userLogin'])) {
            $userId = $_SESSION['userLogin'];
            return $this->getProfileData($userId);
        } else {
            return null;
        }
    }

    private function getProfileData($userId) {
        $usersModel = new UsersModel();
        return $usersModel->readOneUser($userId);
    }
}