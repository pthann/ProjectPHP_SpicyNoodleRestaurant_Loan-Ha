<?php
class TablesCrudHelper {
    private $db;

    public function __construct($connection) {
        $this->db = $connection;
    }

    public function readAllTables($table, $condition = "1", $orderBy = "table_id ASC", $select = "*", $limit = "", $offset = "") {
        if ($limit != "" && $offset != "") {
            $stmt = $this->db->prepare("SELECT $select FROM $table WHERE $condition ORDER BY $orderBy LIMIT $limit OFFSET $offset");
        } else if ($limit != "") {
            $stmt = $this->db->prepare("SELECT $select FROM $table WHERE $condition ORDER BY $orderBy LIMIT $limit");
        } else {
            $stmt = $this->db->prepare("SELECT $select FROM $table WHERE $condition ORDER BY $orderBy");
        }
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function rowCount($table) {
        $stmt = $this->db->prepare("SELECT table_id FROM $table");
        $stmt->execute();
        return $stmt->rowCount();
    }

    public function readOneTable($table, $id, $select = "*") {
        $stmt = $this->db->prepare("SELECT $select FROM $table WHERE table_id = :id");
        $stmt->bindValue(":id", $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function createTable($table, $data) {
        $columns = implode(",", array_keys($data));
        $values = ":" . implode(", :", array_keys($data));
        $stmt = $this->db->prepare("INSERT INTO $table ($columns) VALUES ($values)");
        foreach ($data as $key => $value) {
            $stmt->bindValue(":$key", $value);
        }

        try {
            $stmt->execute();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function updateTable($table, $data, $whereCondition) {
        $setClause = '';
        foreach ($data as $key => $value) {
            $setClause .= "$key = :$key, ";
        }
        $setClause = rtrim($setClause, ', ');

        $sql = "UPDATE $table SET $setClause WHERE $whereCondition";
        $stmt = $this->db->prepare($sql);

        foreach ($data as $key => $value) {
            $stmt->bindValue(":$key", $value);
        }

        try {
            $stmt->execute();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function deleteTable($table, $whereCondition) {
        $sql = "DELETE FROM $table WHERE $whereCondition";
        $stmt = $this->db->prepare($sql);
        try {
            $stmt->execute();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}

