<?php

require_once("models/UserModel.php");
require_once("helpers/ValidationHelper.php");

class AuthController extends Controller {

    public function __construct() {
        parent::__construct();
    }

    public function getLoginPage() {
        if (!isset($_SESSION)) {
            session_start();
        }
        if (isset($_SESSION["userLogin"])) {
            if ($_SESSION["userRole"] == "CUSTOMER") {
                $this->redirect("/home");
            } else {
                $this->redirect("/admin");
            }
        } else {
            $this->renderView("admin/LoginPage");
        }
    }

    public function logout() {
        session_start();
        unset($_SESSION["userLogin"]);
        unset($_SESSION["userAvatar"]);
        unset($_SESSION["userRole"]);
        unset($_SESSION["userName"]);
        $this->redirect("/admin/login");
    }

    public function processEvent() {
        if (isset($_POST["submitLogin"])) {
            $userModel = new UserModel();
            $validation = new ValidationHelper();
            if (!$validation->validateEmail($_POST["email"])) { // if email is invalid
                $this->setData("errorMessage", "Email not valid.");
            } else if (!$validation->validatePassword($_POST["password"])) { // if password invalid
                $this->setData("errorMessage", "Password has at least 8 characters, at least one capital letter, one number character and one special character.");
            } else {
                if ($userModel->authenticateWithEmail($_POST["email"], $_POST["password"])) { // authentication email and password in database
                    session_start();
                    $_SESSION["userRole"] =  $userModel->getRoleFromEmail($_POST["email"]);
                    $_SESSION["userLogin"] =  $userModel->getIdFromEmail($_POST["email"]);
                    $_SESSION["userAvatar"] = $userModel->getAvatarFromEmail($_POST["email"]);
                    $_SESSION["userName"] = $userModel->getFullNameFromEmail($_POST["email"]);
                    $this->redirect("/admin");
                } else {
                    $this->setData("errorMessage", "Email or Password not valid.");
                }
            }
        }
    }
}
