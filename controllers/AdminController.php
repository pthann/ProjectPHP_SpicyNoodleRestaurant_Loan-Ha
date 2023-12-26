<?php
class AdminController extends Controller {

    public function getView() {
        if (!isset($_SESSION)) {
            session_start();
        }
        if (!isset($_SESSION['userLogin'])) {
            $this->redirect("/admin/login");
        } else {
            $userModel = new UserModel();
            $this->setData("title", "Dashboard");
            $this->renderView("admin/AdminHomePage");
        }
    }
}
