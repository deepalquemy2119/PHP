<?php
// Iniciar la sesión
session_start();

// Verificar si hay una sesión activa
if (!isset($_SESSION['user_id'])) {
    // Redirigir si no hay sesión activa
    header('Location: login_register.php');
    exit();
}

// Cerrar la sesión
session_unset();
session_destroy();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- ---------------------- GOOGLE API ------------------------- -->
    
    
    <!-- ---------------------- BOOTSTRAP ------------------------- -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- ---------------------- LOCAL CSS ------------------------- -->
    <link rel="stylesheet" href="./public/css/home.css">
    <title>Cerrar Sesión</title>
</head>
<body>

    <div class="container mt-5">
        <h2>¡Hasta Luego!</h2>
        <p>Has cerrado sesión exitosamente.</p>
        <p>¡Esperamos que regreses pronto!</p>
        <a href="login_register.php" class="btn btn-primary">Iniciar Sesión de Nuevo</a>
    </div>

    <footer class="footer text-center">
        <p class="text-footer">&copy; Gonzalo Rodrigo. DeepAlquemy2024</p>
        <a href="https://www.gmail.com/" target="_blank"><img class="img-icon" src="./public/images/icons/gmail-foto.png" alt="gmail"></a>
        <a href="https://www.youtube.com/" target="_blank"><img class="img-icon" src="./public/images/icons/youtube-foto.png" alt="youtube"></a>
        <a href="https://www.whatsapp.com/" target="_blank"><img class="img-icon" src="./public/images/icons/whatsapp-foto.png" alt="whatsapp"></a>
    </footer>

</body>
</html>
