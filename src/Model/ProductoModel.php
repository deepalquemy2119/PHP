<?php

// class Producto {
//     private $pdo;

//     public function __construct($pdo) {
//         $this->pdo = $pdo;
//     }

//     public function getAll() {
//         $stmt = $this->pdo->prepare("SELECT * FROM producto");
//         $stmt->execute();
//         return $stmt->fetchAll(PDO::FETCH_ASSOC);
//     }

//     public function getById($id) {
//         $stmt = $this->pdo->prepare("SELECT * FROM producto WHERE id_producto = ?");
//         $stmt->execute([$id]);
//         return $stmt->fetch(PDO::FETCH_ASSOC);
//     }

require_once '../../ddbb/conexiones/connectMySql.php';

class Product {
    private $conexion;
    private $table_name = "product";

    public $id;
    public $name;
    public $codigo;
    public $description;
    public $register;
    public $update;
    public $category_id;
    public $company_id;

    public function __construct($db) {
        $this->conexion = $db;
    }

   

 

    public function update() {
        $query = "UPDATE " . $this->table_name . " SET name=:name, codigo=:codigo, description=:description, register=:register, update=:update, category_id=:category_id, company_id=:company_id WHERE id = :id";
        $stmt = $this->conexion->prepare($query);

        $stmt->bindParam(':name', $this->name);
        $stmt->bindParam(':codigo', $this->codigo);
        $stmt->bindParam(':description', $this->description);
        $stmt->bindParam(':register', $this->register);
        $stmt->bindParam(':update', $this->update);
        $stmt->bindParam(':category_id', $this->category_id);
        $stmt->bindParam(':company_id', $this->company_id);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }


    public function create() {
        $query = "INSERT INTO " . $this->table_name . " SET name=:name, codigo=:codigo, description=:description, register=:register, update=:update, category_id=:category_id, company_id=:company_id";
        $stmt = $this->conexion->prepare($query);

        $stmt->bindParam(':name', $this->name);
        $stmt->bindParam(':codigo', $this->codigo);
        $stmt->bindParam(':description', $this->description);
        $stmt->bindParam(':register', $this->register);
        $stmt->bindParam(':update', $this->update);
        $stmt->bindParam(':category_id', $this->category_id);
        $stmt->bindParam(':company_id', $this->company_id);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function read() {
        $query = "SELECT id, name, codigo, description, register, update, category_id, company_id FROM " . $this->table_name . " WHERE id = ? LIMIT 0,1";
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(1, $this->id);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->name = $row['name'];
        $this->codigo = $row['codigo'];
        $this->description = $row['description'];
        $this->register = $row['register'];
        $this->update = $row['update'];
        $this->category_id = $row['category_id'];
        $this->company_id = $row['company_id'];
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


























