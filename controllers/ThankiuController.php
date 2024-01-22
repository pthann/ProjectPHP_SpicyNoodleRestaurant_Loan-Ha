<?php
require_once("controllers/Controller.php");

class ThankiuController extends Controller {

    public function getView() {
        session_start();
        if (!isset($_SESSION['userLogin'])) {
            $this->redirect("/admin/login");
        } else {
            $this->processData();
            $this->processEventOnView();
            include_once("views/pages/user/ThankiuPage.php");
        }
    }

}