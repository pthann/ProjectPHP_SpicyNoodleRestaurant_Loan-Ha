<?php
require_once("models/UsersModel.php");
require_once("models/PutTableModel.php");

class PutTableController extends Controller {
    public function getView() {
        session_start();
        if (!isset($_SESSION['userLogin'])) {
            $this->redirect("/admin/login");
        } else {
            $this->processData();
            include_once("views/pages/user/PutTablePage.php");
        }
    }
    public function processData() {
        $putTableModel = new PutTableModel();
        $putTables = $putTableModel->getTableStatus();
        $this->setData("tables", $putTables);
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $table_id = $_POST['table_id'];
            $user_id = $_SESSION['userLogin']['id'];
            $datetime = date('Y-m-d H:i:s');
            $update_query = "UPDATE `tables` SET `status` = 'selected' WHERE `id` = ?";
            $update_stmt = $putTableModel->getPDO()->prepare($update_query);
            $update_stmt->execute([$table_id]);

            
            $insert_query = "INSERT INTO `user_orders` (`user_id`, `table_id`, `datetime`) VALUES (?, ?, ?)";
            $insert_stmt = $putTableModel->getPDO()->prepare($insert_query);
            $insert_stmt->execute([$user_id, $table_id, $datetime]);
        }
    }
}
?>
