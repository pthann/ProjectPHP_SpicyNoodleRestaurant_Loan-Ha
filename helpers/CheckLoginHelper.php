<?php
class CheckLoginHelper {
    public function adminLoginHelper($controller,$page) {
        if (!isset($_SESSION)) {
            session_start();
        }
        if (!isset($_SESSION['userLogin'])) {
            $controller->redirect("/admin/login");
        } else if ($_SESSION["userRole"] == "ADMIN" || $_SESSION["userRole"] == "MANAGER") {
            $controller->renderView("admin/$page");
        } else {
            include("views/NotFoundPage.php");
        }
    }
}
?>
