<?php
require_once("models/UsersModel.php");
require_once("models/RegisterModel.php");

class RegisterController extends Controller {
    
    public function getView() {
            include_once("views/pages/RegisterPage.php");
            $this->processEventOnView();
    }
    public function processEventOnView() {
        if (isset($_POST["submitRegister"])) {
            $this->addUsersEvent();
        }}
    
        public function addUsersEvent() {
            $registerModel = new RegisterModel();
            $name = $_POST["name"];
            $email=$_POST["email"];
            $password=$_POST["password"];
            $hashed_password = password_hash($password, PASSWORD_BCRYPT);
            $avatar = $_POST["avatar"]; 
            $telephone = $_POST["telephone"]; 
            $role = $_POST["role"]; 
            
            if (empty($name)||empty($email)||empty($password)||empty($avatar)||empty($telephone)||empty($role)|| trim($name) == "" ||trim($email)==""||trim($password)==""||trim($avatar)==""||trim($telephone)==""||trim($role)=="") {
                $this->setData("errorMessage", "Please enter complete information for the fields.");
            } else {
                if ($registerModel->isExistName($email) ) {
                    $this->setData("errorMessage", "Email already exists.");
                } 
                else {
                    $registerData = [
                        "name" => $name,
                        "email" => $email,
                        "password" => $hashed_password,
                        "avatar" => $avatar,
                        "telephone" => $telephone,
                        "role" => $role
                    ];
    
                    $registerModel->createRegister($registerData);
                    $this->setData("successMessage", "Register added successfully!");
                }
            }
        }
}