<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Jobs</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100..900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/home.css">
</head>
<body>
    <nav class="navbar">
        <a href="index.php"><span class="back">Back</span></a>
        
        <a href="register.php"><span class="job-register">Job Register</span></a>
        <!-- <a href="./login.html"><span class="text-nav">Login</span></a> -->
    </nav>

    <header class="header-content">
        <h3>Selecciona una Oportunidad de Trabajo</h3>
        <div class="job-list">
            <ul>
                <li><a href="./views/jobs.php?category=engineering">Ingeniería</a></li>
                <li><a href="./views/jobs.php?category=marketing">Marketing</a></li>
                <li><a href="./views/jobs.php?category=design">Diseño</a></li>
                <li><a href="./views/jobs.php?category=desarrollo">Desarrollo</a></li>
                <li><a href="./views/jobs.php?category=traducciones">Traducciones</a></li>
                <li><a href="./views/jobs.php?category=oficina">Oficina</a></li>
                <li><a href="./views/jobs.php?category=contabilidad">Contabilidad</a></li>
                <li><a href="./views/jobs.php?category=profesores">Profesores</a></li>
                <!-- Agrego más rubros según sea necesario -->
            </ul>
        </div>
    </header>

    <footer class="footer">
        <p class="footer-owner">&copy;Gonzalo Rodrigo. DeepAlquemy2024</p>
        <a href="https://www.gmail.com/" target="_blank"><img class="img-icon" src="../images/icons/gmail-foto.png" alt="gmail"></a>
        <a href="https://www.whatsapp.com/" target="_blank"><img class="img-icon" src="../images/icons/whatsapp-foto.png" alt="whatsapp"></a>
    </footer>
</body>
</html>
