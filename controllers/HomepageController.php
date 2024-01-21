<?php
require_once("models/UsersModel.php");
require_once("models/ProductModel.php");

class HomepageController extends Controller {

    public function getView() {
        session_start();
        if (!isset($_SESSION['userLogin'])) {
            $this->redirect("/admin/login");
        } else {
            $this->processData();
            include_once("views/pages/user/HomePage.php");
        }
       
    }

    public function processData() {
        $userModel = new UsersModel();
        $foodModel = new ProductModel();
        $this->setData("title", "Food");
        $this->setData("avatar", $userModel->getAvatarFromId($_SESSION["userLogin"]));
        $this->setData("food", $foodModel->readAll());
    }
}
?>
