<?php

include_once('helpers/CrudHelper.php');

class DetailFoodModel extends Model {
    public function __construct() {
        parent::__construct("food");
        $this->table = "food";
    }
}
?>