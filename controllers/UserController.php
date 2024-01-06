<?php
require_once("helpers/CheckLoginHelper.php");

require_once("models/UserModel.php");

class UserController extends Controller {

    public function __construct() {
        parent::__construct();
    }
    public function getView() {
       $checkLoginHelper = new CheckLoginHelper();
       $checkLoginHelper-> adminLoginHelper($this,"UserPage");
    }

    public function processEvent() {
        if (isset($_POST["addUser"])) {
            $this->addUserEvent();
            unset($_POST["addUser"]);
        }

        if (isset($_POST["deleteUser"])) {
            $this->deleteUserEvent();
            unset($_POST["deleteUser"]);
        }

        if (isset($_POST["updateUser"])) {
            $this->editUserevent();
            unset($_POST["updateUser"]);
        }

        if (isset($_GET["search"])) {
            $this->searchUserEvent($_GET["search"]);
        }
    }

    public function processData() {
        $UserModel = new UserModel();
        $this->setData("title", "User");
        $this->setData("users", $UserModel->readAll());
    }

    public function addUserEvent() {
        
    }

    public function editUserEvent() {
       
        
    }

    public function deleteUserEvent() {
       
    }

    public function searchUserEvent($key) {
        
    }
}
