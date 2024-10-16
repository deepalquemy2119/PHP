<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear Usuario</title>
</head>
<body>
    <h1>Crear Usuario</h1>
    <form action="crear_usuario.php" method="post">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br>

        <label for="name">Nombre:</label>
        <input type="text" id="name" name="name" required><br>

        <label for="password">Contraseña:</label>
        <input type="password" id="password" name="password" required><br>

        <input type="submit" value="Crear Usuario">
    </form>

    <?php
    // Incluir conexión
    include 'conexion.php';

    // Manejo del formulario
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $email = $_POST['email'];
        $name = $_POST['name'];
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT); // Hasheando la contraseña

        // Insertar usuario en la base de datos
        $sql = "INSERT INTO user (email, name, password, register) VALUES (?, ?, ?, NOW())";
        $stmt = $conexion->prepare($sql);

        if ($stmt) {
            $stmt->bind_param("sss", $email, $name, $password);
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
    ?>
</body>
</html>
