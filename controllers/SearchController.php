<?php
require_once("models/UsersModel.php");
require_once("models/SearchModel.php");

class SearchController extends Controller {
   
    public function getView() {
        session_start();
        if (!isset($_SESSION['userLogin'])) {
            $this->redirect("/admin/login");
        } else {
            $this->processData();
            include_once("views/pages/user/SearchPage.php");
        }
    }

    public function processEventOnView() {
        if (isset($_GET["search"])) {
            $this->searchFoodEvent($_GET["search"]);
        }
    }

    public function searchFoodEvent($key) {
        $searchModel = new SearchModel(); 
        $this->setData("foods", $searchModel->searchBy($key));
    }
}
?>
