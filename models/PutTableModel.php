<?php
include_once('helpers/CrudHelper.php');

class PutTableModel extends Model {
    public function __construct() {
        parent::__construct("tables");
        $this->table = "tables";
    }
public function getTableStatus() {
    $tables = $this->readAll();
    foreach ($tables as &$table) {
        if ($table['status'] === 'selected') {
            $table['color'] = 'red';
        } else {
            $table['color'] = 'black';
        }
    }
    return $tables;
}
    public function getPDO() {
        return $this->crudHelper->getPDO();
    }

    public function isTableAvailable($table_id) {
        $table = $this->readOne($table_id);
        return ($table['status'] === 'normal');
    }

    public function updateTableStatus($table_id, $status) {
        $this->update(['status' => $status], "id = $table_id");
    }

    public function insertUserOrder($user_id, $table_id, $datetime) {
        $this->create('user_orders', ['user_id' => $user_id, 'table_id' => $table_id, 'datetime' => $datetime]);
    }
}
?>
