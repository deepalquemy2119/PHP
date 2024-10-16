<?php
//Iniciar la sesión
session_start();

if (!isset($_SESSION['user_id'])) {

// Redirigir si no hay sesión activa
    header('Location: login_register.php');
    exit();
}


?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- ---------------------- BOOTSTRAP ------------------------- -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- ---------------------- LOCAL CSS ------------------------- -->
    <link rel="stylesheet" href="./public/css/home.css">
    <title>C2B Home</title>
</head>
<body>

    <div class="container mt-5">
        <h2>Welcome to C2B</h2>
        <p>Contenido exclusivo para usuarios autenticados.</p>
        <a href="logout.php" class="btn btn-danger">Cerrar Sesión</a>
    </div>

    <footer class="footer text-center">
    <p class="text-footer">&copy;Gonzalo Rodrigo. DeepAlquemy2024</p>
    <a href="https://www.gmail.com/" target="_blank"><img class="img-icon" src="./public/images/icons/gmail-foto.png" alt="gmail"></a>

    <a href="https://www.youtube.com/" target="_blank"><img class="img-icon" src="./public/images/icons/youtube-foto.png" alt="youtube"></a>

    <a href="https://www.whatsapp.com/" target="_blank"><img class="img-icon" src="./public/images/icons/whatsapp-foto.png" alt="whatsapp"></a>
    
</footer>

</body>
</html>
