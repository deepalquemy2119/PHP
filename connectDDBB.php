<?php
include 'load_env.php'; // Incluir el archivo para cargar variables de entorno

$servername = $_ENV['DB_SERVER'];
$username = $_ENV['DB_USERNAME'];
$password = $_ENV['DB_PASSWORD'];
$dbname = $_ENV['DB_NAME'];

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    die("Connect success!");
}
?>



<!-- edit.html -->
<form action="edit.php" method="POST">
    <input type="text" name="username" placeholder="Username" required>
    <input type="password" name="new_password" placeholder="New Password" required>
    <button type="submit">Edit User</button>
</form>

<?php
// edit.php

// Conectar a la base de datos
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Recoger datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $conn->real_escape_string($_POST['username']);
    $new_password = password_hash($_POST['new_password'], PASSWORD_DEFAULT); // Hash de la nueva contraseña

    // Actualizar la contraseña
    $sql = "UPDATE users SET password='$new_password' WHERE username='$username'";
    
    if ($conn->query($sql) === TRUE) {
        echo "Contraseña actualizada con éxito.";
    } else {
        echo "Error al actualizar: " . $conn->error;
    }
}

$conn->close();
?>

