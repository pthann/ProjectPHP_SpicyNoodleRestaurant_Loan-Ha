<?php
require_once ("helpers/CrudHelper.php");
require_once ("databases/Connection.php");

abstract class Model {
    protected $crudHelper;
    protected $table;

    public function __construct($table) {
        $connection = new Connection();
        $this-> crudHelper = new CrudHelper ($connection->getConnection() );
        $this->table = $table; 
    }

    public function readAll() {
        return $this->crudHelper-> readAll($this->table);
    }

    public function rowCount() {
        return $this->crudHelper-> rowCount($this->table);
    }

    public function readOne($id) {
        return $this->crudHelper-> readOne($this->table, $id);
    }

    public function create($data) {
        $this->crudHelper-> create($this->table, $data);
    }

    public function update($data, $id) {
        $this->crudHelper-> update($this->table, $data, "id=$id");
    }

    public function delete($id) {
        $this->crudHelper->delete($this->table, "id=$id");
    }

}
?>