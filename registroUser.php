<?php
include_once 'connectDDBB.php';
include_once 'load_env.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Verificar si el usuario ya está registrado
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "El correo electrónico ya está registrado.";
    } else {
        // Insertar nuevo usuario
        $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $nombre, $email, $password);
        
        if ($stmt->execute()) {
            echo "Registro exitoso.";
            // Redirigir a otra página si es necesario
            // header("Location: otra_pagina.php");
            exit();
        } else {
            echo "Error al registrar el usuario: " . $stmt->error;
        }
    }
    $stmt->close();
}
$conn->close();
