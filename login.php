<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- ----------- Bootstrap ------------ -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

        <!-- ------------ GOOGLE FONTS ------------- -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    

    <!-- ------------- CSS local ---------------- -->
    <link rel="stylesheet" href="../css/login.css">

    <link rel="stylesheet" href="./public/css/login.css">

     
    <title>C2B Login</title>
</head>
<body>
    <h1 class="form m-3">Login</h1>

    <header>

    <!-- Como no tengo un servidor. Lo mando de nuevo al inicio -->
        <form class="container" action="index.php" method="get">
            <!-- --------- username --------- -->
            <div class="col-md-3">
                <label for="username">Username</label><br>
                <input type="text" class="form-control" id="username" placeholder="username"><br>
                
            </div>         
            
            <!-- ----------- email ---------- -->
            <div class="col-md-3">
                <label for="floatingInput">Email address</label><br>
                <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com"><br>
                
            </div>
            <!-- ----------- password ---------- -->
            <div class="col-md-3">
                <label for="floatingPassword">Password</label><br>
                <input type="password" class="form-control" id="floatingPassword" placeholder="Password"><br>
                
            </div>

            <div class="col-md-3">
                <div class="botones justify-content-between mb-5">

                   
                    
                      <input type="submit" class="war btn btn-warning" value="Back">
                    <input type="submit" class="succ btn btn-success" value="Send">
                </div>
            </div>
                
            </form>
        </header>
        
    <footer>
        <br><br>
        <p class="text-footer">&copy;Gonzalo Rodrigo. DeepAlquemy2024 </p>

     
    </footer>
</body>
</html>




<?php

session_start();
include './load_env.php'; 
include './connectDDBB.php'; 

// Conectar a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "prueba_php"; 

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    die("Conexión Exitosa!"); // O utiliza echo para mostrar un mensaje en lugar de die
}

if (!isset($_SESSION['user_id'])) {
    // Redirigir a la página de inicio o registro de sesion
    header('Location: home.php');
    exit();
}

// exit();
$conn->close();
    
?>
