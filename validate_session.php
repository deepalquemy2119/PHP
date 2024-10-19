<?php

session_start();

// variables de entorno
include_once 'load_env.php';

// base de datos
$servername = getenv('DB_SERVER');
$username = getenv('DB_USERNAME');
$password = getenv('DB_PASSWORD');
$dbname = getenv('DB_NAME');

// conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// controlo conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

if (isset($_SESSION['user_id'])) {
// consulta para verificar si user_id existe
    $user_id = $_SESSION['user_id'];
    $stmt = $conn->prepare("SELECT id FROM users WHERE id = ?");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
// user_id existe, me voy a página principal
        header('Location: index.php');
    } else {
// user_id no existe, a login_register
        header('Location: login_register.php');
    }

    $stmt->close();
} else {
// si no hay sesión iniciada, a login_register
    header('Location: login_register.php');
}

//cierro
$conn->close();
exit();
?>
