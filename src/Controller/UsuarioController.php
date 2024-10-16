<?php
// Incluir conexión a la base de datos
include '../../ddbb/conexiones/connectMySql.php';

// Manejo del formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    // Verificar si el usuario ya existe
    $sql = "SELECT * FROM user WHERE email = ? OR username = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("ss", $email, $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Aquí puedes hacer un mejor manejo de errores
        echo "El usuario ya existe. Por favor, elige otro email o username.";
    } else {
        // Insertar usuario en la base de datos
        $sql = "INSERT INTO user (name, username, email, password, register) VALUES (?, ?, ?, ?, NOW())";
        $stmt = $conexion->prepare($sql);
        if ($stmt) {
            $stmt->bind_param("ssss", $name, $username, $email, $password);
            if ($stmt->execute()) {
                echo "Usuario creado exitosamente.";
            } else {
                echo "Error al crear usuario: " . $conexion->error;
            }
            $stmt->close();
        } else {
            echo "Error en la preparación de la consulta: " . $conexion->error;
        }
    }
    $stmt->close();
}
$conexion->close();

?>


<!-- Conexión a la Base de Datos

Tu conexión a la base de datos parece estar bien, pero asegúrate de cerrarla solo después de que todas las consultas se hayan ejecutado.
Notas Adicionales

    Manejo de Errores: Considera implementar un sistema de manejo de errores más robusto, quizás usando sesiones o redireccionando a una página de error.

    Seguridad: Asegúrate de validar y sanitizar todas las entradas del usuario para prevenir inyecciones SQL y otros tipos de ataques.

    Mensajes al Usuario: Podrías redirigir a los usuarios a otra página donde muestres el mensaje de éxito o error, en lugar de mostrarlo directamente en el formulario.

    Asegúrate de probar el flujo de registro y las validaciones en diferentes escenarios para garantizar que todo funcione como se espera. -->