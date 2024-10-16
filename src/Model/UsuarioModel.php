<?php

//----------------------- Modelo ---------------------
class User {
    private $id;
    private $email;
    private $name;
    private $password;
    private $register;
    private $update;

    // Constructor
    public function __construct($email, $name, $password) {
        $this->email = $email;
        $this->name = $name;
        $this->setPassword($password);
        $this->register = date("Y-m-d H:i:s");
        $this->update = null;
    }

    // Getters
    public function getId() {
        return $this->id;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getName() {
        return $this->name;
    }

    public function getPassword() {
        return $this->password;
    }

    public function getRegister() {
        return $this->register;
    }

    public function getUpdate() {
        return $this->update;
    }

    // Setters
    public function setId($id) {
        $this->id = $id;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function setPassword($password) {
        $this->password = password_hash($password, PASSWORD_DEFAULT);
    }

    public function setUpdate($update) {
        $this->update = $update;
    }

    // Método para guardar el usuario en la base de datos
    public function save($conn) {
        $stmt = $conn->prepare("INSERT INTO user (email, name, password, register) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $this->email, $this->name, $this->password, $this->register);
        $stmt->execute();
        $this->id = $stmt->insert_id; // Obtener el ID generado
        $stmt->close();
    }

    // Método para obtener un usuario por ID
    public static function getById($conn, $id) {
        $stmt = $conn->prepare("SELECT * FROM user WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($row = $result->fetch_assoc()) {
            $user = new User($row['email'], $row['name'], $row['password']);
            $user->setId($row['id']);
            $user->setUpdate($row['update']);
            $user->register = $row['register']; // No hay setter para register
            return $user;
        }
        return null;
    }

    // Método para actualizar el usuario
    public function update($conn) {
        $stmt = $conn->prepare("UPDATE user SET email = ?, name = ?, password = ?, update = NOW() WHERE id = ?");
        $stmt->bind_param("sssi", $this->email, $this->name, $this->password, $this->id);
        $stmt->execute();
        $stmt->close();
    }

    // Método para eliminar el usuario
    public function delete($conn) {
        $stmt = $conn->prepare("DELETE FROM user WHERE id = ?");
        $stmt->bind_param("i", $this->id);
        $stmt->execute();
        $stmt->close();
    }
}
