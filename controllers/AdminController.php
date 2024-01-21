<?php
class AdminController extends Controller {
 
    public function getView() {
        session_start();
        if (!isset($_SESSION['userLogin'])) {
            $this->redirect("/login");
        } else {
            $userModel = new UsersModel();
            $this->setData("title", "Dashboard");
            $this->renderView("admin/AdminHomePage");
        }
       
    }
}
