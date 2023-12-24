<?php
class AdminController extends Controller {
 
    public function getView() {
        session_start();
        if (!isset($_SESSION['userLogin'])) {
            $this->redirect("/admin/login");
        } else {
            $userModel = new UserModel();
            $this->setData("title", "Dashboard");
            $this->setData("avatar", $userModel->getAvatarFromId($_SESSION["userLogin"]));
            $this->renderView("AdminHomePage");
        }
       
    }
}
