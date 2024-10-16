<?php
session_start();
$host = 'localhost';
$db = 'prueba_php';
$user = 'root';
$pass = '';
$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Aquí se supone que implementamos el login de compañías, que puede requerir una tabla de usuarios administrativos o similar.
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    
    $sql = "SELECT * FROM companies WHERE nombre = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $nombre);
    $stmt->execute();
    $result = $stmt->get_result();
    $company = $result->fetch_assoc();

    if ($company) {
        $_SESSION['company_id'] = $company['id_company'];
        echo "Inicio de sesión de compañía exitoso.";
    } else {
        echo "Nombre de compañía incorrecto.";
    }

    $stmt->close();
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Inicio de Sesión de Compañía</title>
</head>
<body>
    <h2>Inicio de Sesión de Compañía</h2>
    <form method="post">
        <label for="nombre">Nombre de Compañía:</label>
        <input type="text" id="nombre" name="nombre" required>
        <br>
        <input type="submit" value="Iniciar Sesión">
    </form>
</body>
</html>

<!-- 
Seguridad: Asegúrate de implementar medidas de seguridad como la validación de entradas y la protección contra inyecciones SQL. Además, considera usar HTTPS.

Estructura de Base de Datos: Asegúrate de que la base de datos esté correctamente configurada antes de ejecutar los scripts PHP.

Sesiones: El uso de sesiones es clave para gestionar la autenticación de usuarios y compañías. Asegúrate de manejar el cierre de sesión y la expiración de sesiones adecuadamente.

Estilos: Puedes agregar CSS para mejorar la apariencia de los formularios. -->