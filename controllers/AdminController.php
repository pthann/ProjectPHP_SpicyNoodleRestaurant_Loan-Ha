<?php
class AdminController extends Controller {

    public function getView() {
        session_start();
        if (!isset($_SESSION['userLogin'])) {
            $this->redirect("/admin/login");
        }
        $this->renderView("AdminHomePage");
    }
}
