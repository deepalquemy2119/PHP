<?php

require_once '../../ddbb/conexiones/connectMySql.php';

class Company {
    private $conexion;
    private $table_name = "company";

    public $id;
    public $name;
    public $email;
    public $codigo;
    public $description;
    public $register;
    public $update;

    public function __construct($db) {
        $this->conexion = $db;
    }

//------------------ CREATE ------------------
    public function create() {
        $query = "INSERT INTO " . $this->table_name . " SET name=:name, email=:email, codigo=:codigo, description=:description, register=:register, update=:update";

        $stmt = $this->conexion->prepare($query);

        $stmt->bindParam(':name', $this->name);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':codigo', $this->codigo);
        $stmt->bindParam(':description', $this->description);
        $stmt->bindParam(':register', $this->register);
        $stmt->bindParam(':update', $this->update);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

//---------------------- READ ---------------------
    public function read() {
        $query = "SELECT id, name, email, codigo, description, register, update FROM " . $this->table_name . " WHERE id = ? LIMIT 0,1";
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(1, $this->id);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->name = $row['name'];
        $this->email = $row['email'];
        $this->codigo = $row['codigo'];
        $this->description = $row['description'];
        $this->register = $row['register'];
        $this->update = $row['update'];
    }


//-------------------- UPDATE ------------------
    public function update() {
        $query = "UPDATE " . $this->table_name . " SET name=:name, email=:email, codigo=:codigo, description=:description, register=:register, update=:update WHERE id = :id";
        $stmt = $this->conexion->prepare($query);

        $stmt->bindParam(':name', $this->name);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':codigo', $this->codigo);
        $stmt->bindParam(':description', $this->description);
        $stmt->bindParam(':register', $this->register);
        $stmt->bindParam(':update', $this->update);
        $stmt->bindParam(':id', $this->id);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

//------------------------ DELETE -------------------
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
