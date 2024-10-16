<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);


include_once 'load_env.php';

$servername = getenv('DB_SERVER');
$username = getenv('DB_USERNAME');
$password = getenv('DB_PASSWORD');
$dbname = getenv('DB_NAME');

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    // Si la conexión es exitosa, guardamos el estado
    $connection_success = true;
}

// Opcionalmente, puedes cerrar la conexión
//$conn->close();
?>
