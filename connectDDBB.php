<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);


include_once 'load_env.php';
session_start();

if (isset($_SESSION['user_id'])) {
// Conectar a la base de datos
    include_once 'load_env.php';
    
    $servername = getenv('DB_SERVER');
    $username = getenv('DB_USERNAME');
    $password = getenv('DB_PASSWORD');
    $dbname = getenv('DB_NAME');

    $conn = new mysqli($servername, $username, $password, $dbname);

// Verifico conexión
    if ($conn->connect_error) {
        die("Conexion fallida: " . $conn->connect_error);
    }

// Consulto si el user_id existe
    $user_id = $_SESSION['user_id'];
    $stmt = $conn->prepare("SELECT id FROM users WHERE id = ?");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
// user_id existe, me voy a la página principal
        header('Location: index.php');
    } else {
// user_id no existe, me voy a login_register
        header('Location: login_register.php');
    }

    $stmt->close();
    $conn->close();
} else {
    header('Location: login_register.php');
}

?>
