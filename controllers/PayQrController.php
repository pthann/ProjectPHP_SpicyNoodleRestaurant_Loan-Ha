<?php
require_once("controllers/Controller.php");

class PayQrController extends Controller {

    public function getView() {
        session_start();
        if (!isset($_SESSION['userLogin'])) {
            $this->redirect("/admin/login");
        } else {
            $this->processData();
            $this->processEventOnView();
            include_once("views/pages/user/PayQrPage.php");
        }
    }
}