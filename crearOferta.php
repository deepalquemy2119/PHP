<?php
session_start();
include_once 'connectDDBB.php';

// Verificar si la empresa ha iniciado sesión
if (!isset($_SESSION['company_id'])) {
    header("Location: login_register.php"); 
    // Redirigir si no está autenticado
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titulo = $_POST['titulo'];
    $descripcion = $_POST['descripcion'];
    $companyId = $_SESSION['company_id'];

    // Insertar nueva oferta en la base de datos
    $stmt = $conn->prepare("INSERT INTO job_offers (id_company, titulo, descripcion) VALUES (?, ?, ?)");
    $stmt->bind_param("iss", $companyId, $titulo, $descripcion);

    if ($stmt->execute()) {
        echo "Oferta creada con éxito.";
        header("Location: panelControl.php");
         // Redirigir al panel de control
        exit;
    } else {
        echo "Error al crear la oferta: " . $stmt->error;
    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear Oferta - My C2B</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <header class="bg-primary text-white text-center p-3">
        <h1>Crear Nueva Oferta de Trabajo</h1>
    </header>
    <div class="container mt-5">
        <form action="crearOferta.php" method="post">
            <div class="mb-3">
                <label for="titulo" class="form-label">Título de la Oferta</label>
                <input type="text" class="form-control" id="titulo" name="titulo" required>
            </div>
            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripción de la Oferta</label>
                <textarea class="form-control" id="descripcion" name="descripcion" rows="4" required></textarea>
            </div>
            <a href="panelControl.php" class="btn btn-secondary">Volver al Panel</a>
            <input type="submit" class="btn btn-success" value="Crear Oferta">
        </form>
    </div>
</body>
</html>


<!-- Que hace el Código

    Verificación de Sesión: 
        Al principio del archivo, vemos si la empresa ha iniciado sesión.
        Si no, redirigimos a la página de inicio de sesión.

    Manejo de la Solicitud POST:
        Si se envía el formulario, se recogen los datos del título y la descripción de la oferta.
        Se realiza una inserción en la base de datos usando una consulta preparada para prevenir inyecciones SQL.
        Si la inserción es exitosa, se redirige al panel de control. De lo contrario, se muestra un mensaje de error.

    Formulario:
        El formulario contiene un campo para el título y un área de texto para la descripción de la oferta.
        Hay un botón para enviar el formulario y otro para volver al panel de control.

    Probar la Funcionalidad

    validar la conexión a la base de datos. en connectDDBB.php.
    ir a crearOferta.php después de iniciar sesión como empresa.
    llenar el formulario y mandar. Verifica que la oferta se agregue correctamente a la base de datos y que se es llevado al panel de control.

    Validaciones: 
        hacer validaciones tanto en el lado del cliente como en el servidor para garantizar los datos.
        Éxito/Errores: mostrar mensajes.
        Diseño: ver de mejorar.

 -->