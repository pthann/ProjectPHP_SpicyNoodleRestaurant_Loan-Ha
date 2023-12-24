<?php

require_once("models/UserModel.php");
require_once("helpers/ValidationHelper.php");

class AuthController extends Controller {

    public function getLoginPage() {
        session_start();
        if (isset($_SESSION["userLogin"]) && $_SESSION["userRole"]) {
            if ($_SESSION["userRole"] == "admin") {
                $this->redirect("/admin");
            } else {
                $this->redirect("/home");
            }
        }
        $this->renderView("LoginPage");
    }

    public function logout() {
        session_start();
        unset($_SESSION["userLogin"]);
        unset($_SESSION["userLRole"]);
        $this->redirect("/admin/login");
    }

    public function processEventOnView() {
        if (isset($_POST["submitLogin"])) {
            $userModel = new UserModel();
            $validation = new ValidationHelper();


            if (!$validation->validateEmail($_POST["email"])) {
                $this->setData("errorMessage", "Email not valid.");
            } else if (!$validation->validatePassword($_POST["password"])) {
                $this->setData("errorMessage", "Password has at least 8 characters, at least one capital letter, one number character and one special character.");
            } else {
                if ($userModel->authenticateWithEmail($_POST["email"], $_POST["password"])) {
                    session_start();
                    $_SESSION["userLogin"] =  $userModel->getIdFromEmail($_POST["email"]);
                    $_SESSION["userRole"] = $userModel->isExistEmail($_POST["email"]);
                    $this->redirect("/admin");
                } else {
                    $this->setData("errorMessage", "Email or Password not valid.");
                }
            }
        }
    }
}
