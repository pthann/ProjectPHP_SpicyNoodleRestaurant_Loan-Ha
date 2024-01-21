<?php
require_once("models/UsersModel.php");
require_once("models/MenuModel.php");

class MenuController extends Controller {

    public function getView() {
        session_start();
        if (!isset($_SESSION['userLogin'])) {
            $this->redirect("/admin/login");
        } else {
            $this->processData();
            include_once("views/pages/user/MenuPage.php");
        }
       
    }

    public function processData() {
        $userModel = new UsersModel();
        $foodModel = new ProductModel();
        $this->setData("title", "Menu");
        $this->setData("avatar", $userModel->getAvatarFromId($_SESSION["userLogin"]));
        $this->setData("food", $foodModel->readAll());
    }
}
?>