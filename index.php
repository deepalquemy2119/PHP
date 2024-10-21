<?php
// var de entorno
include_once 'load_env.php';
include_once 'connectDDBB.php';


?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- ---------------------- GOOGLE API ------------------------- -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <!-- ---------------------- BOOTSTRAP ------------------------- -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- ---------------------- LOCAL CSS ------------------------- -->
    <link rel="stylesheet" href="./public/css/login_register.css">
    <title>My C2B</title> 
</head>
<body>
<!-- ---------------------- NAV ------------------------- -->
<nav class="navbar">
    <a href="login_register.php" class="text-nav"><h5>Home</h5></a>
</nav>
<!-- ---------------------- HEADER ------------------------- -->
<header class="header-content">
    <div class="header-text">
        <p class="welcome">...welcome to </p>
        <h1 class="title-h1">My C2B</h1>
        <p class="collaboration">in collaboration with Deep Alquemy Co.</p>
    </div>
</header>
<!-- ---------------------- FOOTER ------------------------- -->
<footer class="footer text-center">
    <p class="text-footer">&copy;Gonzalo Rodrigo. DeepAlquemy2024</p>
    <a href="https://www.gmail.com/" target="_blank"><img class="img-icon" src="./public/images/icons/gmail-foto.png" alt="gmail"></a>
    <a href="https://www.youtube.com/" target="_blank"><img class="img-icon" src="./public/images/icons/youtube-foto.png" alt="youtube"></a>
    <a href="https://www.whatsapp.com/" target="_blank"><img class="img-icon" src="./public/images/icons/whatsapp-foto.png" alt="whatsapp"></a>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
