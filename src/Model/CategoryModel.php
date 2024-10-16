<?php
require_once '../../ddbb/conexiones/connectMySql.php';

class Category {
    private $conexion;
    private $table_name = "category";

    public $id;
    public $name;
    public $description;
    public $codigo;
    public $register;
    public $update;

    public function __construct($db) {
        $this->conexion = $db;
    }

    public function create() {
        $query = "INSERT INTO " . $this->table_name . " SET name=:name, description=:description, codigo=:codigo, register=:register, update=:update";

        $stmt = $this->conexion->prepare($query);

        $stmt->bindParam(':name', $this->name);
        $stmt->bindParam(':description', $this->description);
        $stmt->bindParam(':codigo', $this->codigo);
        $stmt->bindParam(':register', $this->register);
        $stmt->bindParam(':update', $this->update);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function read() {
        $query = "SELECT id, name, description, codigo, register, update FROM " . $this->table_name . " WHERE id = ? LIMIT 0,1";
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(1, $this->id);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->name = $row['name'];
        $this->description = $row['description'];
        $this->codigo = $row['codigo'];
        $this->register = $row['register'];
        $this->update = $row['update'];
    }

    public function update() {
        $query = "UPDATE " . $this->table_name . " SET name = :name, description = :description, codigo = :codigo, register = :register, update = :update WHERE id = :id";
        $stmt = $this->conexion->prepare($query);

        $stmt->bindParam(':name', $this->name);
        $stmt->bindParam(':description', $this->description);
        $stmt->bindParam(':codigo', $this->codigo);
        $stmt->bindParam(':register', $this->register);
        $stmt->bindParam(':update', $this->update);
        $stmt->bindParam(':id', $this->id);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function delete() {
        $query = "DELETE FROM " . $this->table_name . " WHERE id = :id";
        $stmt = $this->conexion->prepare($query);

        $stmt->bindParam(':id', $this->id);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
}
?>
