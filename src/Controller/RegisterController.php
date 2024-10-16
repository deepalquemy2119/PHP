<?php

$host = '192.168.100.6';
$port = '5432';
$dbname = 'DDBB_Back_PHP';
$user = 'postgres';
$password = 'Utn54200593$&?';

try {
    // Crear conexión con PDO
    $dsn = "pgsql:host=$host;port=$port;dbname=$dbname";
    $conn = new PDO($dsn, $user, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Capturar datos del formulario
    $name = $_POST['name'];
    $last = $_POST['last'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash del password
    $mensaje = $_POST['mensaje'];

    // Validar si el email ya existe en la base de datos
    $sql = "SELECT * FROM user WHERE email = :email";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':email', $email);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        echo "El email ya existe. Intenta con otro.";
    } else {
        // Insertar el nuevo usuario en la base de datos
        $sql = "INSERT INTO user (email, name, password, register) VALUES (:email, :name, :password, NOW())";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':password', $password);

        if ($stmt->execute()) {
            echo "Usuario registrado correctamente.";
        } else {
            echo "Error: " . $stmt->errorInfo()[2];
        }
    }

} catch (PDOException $e) {
    echo "Error de conexión: " . $e->getMessage();
}


// Cierra la conexión
$conn = null;
