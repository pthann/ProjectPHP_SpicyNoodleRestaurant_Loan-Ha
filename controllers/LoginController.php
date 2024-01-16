<?php
require_once("models/UsersModel.php");
require_once("models/LoginModel.php");

class LoginController extends Controller {

    public function getView() {
        include_once("views/pages/LoginPage.php");
        $this->processEventOnView();
    }

    public function processEventOnView() {
        if (isset($_POST["submitLogin"])) {
            $this->authenticateUserEvent();
        }
    }

    public function authenticateUserEvent() {
        $loginModel = new LoginModel();
        $email = $_POST["email"];
        $password = $_POST["password"];

        if (empty($email) || empty($password) || trim($email) == "" || trim($password) == "") {
            $this->setData("errorMessage", "Please enter both email and password.");
        } else {
            $user = $loginModel->authenticateUser($email, $password);

            if ($user) {
                session_start();
                $_SESSION['userLogin'] = $user;
                $this->redirect("/home"); 
            } else {
                $this->setData("errorMessage", "Invalid email or password.");
            }
        }
    }
}
